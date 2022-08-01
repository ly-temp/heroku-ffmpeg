#!/bin/bash
#input: [input file] [volume] [output suffix]
target_db=$2
if [ "$3" = "" ]; then
	filename=$(basename -- "$1")
	suffix=".${filename##*.}"
else
	suffix=$3
fi

diff_db(){
local line=($(ffmpeg -i "$file" -filter:a volumedetect -f null /dev/null 2>&1))
local len=${#line[@]}
local diff=0
for((i=0;i<$len;i++)); do
	#echo $i
	#echo ${line[$i]}
	if [ ${line[$i]} = "mean_volume:" ]; then
		local value=${line[$i+1]}
		diff=$(echo "$target_db - $value" | bc)
		#echo "$value${line[$i+2]}->diff:$diff"
	fi
done
echo $diff
}

echo "in file: $1"
file=$1
diff=$(diff_db)
value=0
str_value=""
file=$out_f
while
  if [ -f "$out_f" ]; then
	rm "$out_f"
  fi

  value=$(echo "$value" + "$diff" | bc)
  str_value=$value"dB"
  out_f="${1%.*}[$str_value]$suffix"
  echo "parameter: $str_value"
  output=$(ffmpeg -i "$1" -filter:a "volume=$str_value" -y "$out_f" 2>&1);
  file=$out_f
  diff=$(diff_db)
  echo "diff: ${diff}dB"
  echo '------'
  [ "$diff" != "0" ]
do true; done
echo "output=$out_f"
$(printf "$out_f\n" >> ../complete.list)
