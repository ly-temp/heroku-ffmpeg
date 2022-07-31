#!/bin/sh
#input: [output suffix] [input file]
target_db=-54.4
out_f="out.mp3"
suffix=$1

if [ "$suffix" == ".mp3" ]; then
	type="a"
else
	if [ "$suffix" == ".3gp" ]; then
		type="v"
	fi
fi
echo "type: $type"

diff_db(){
local line=($(ffmpeg -i "$file" -filter:a volumedetect -f null /dev/null 2>&1))
local len=${#line[@]}
local diff=0
for((i=0;i<$len;i++)); do
	#echo $i
	#echo ${line[$i]}
	if [ ${line[$i]} == "mean_volume:" ]; then
		local value=${line[$i+1]}
		diff=$(echo "$target_db - $value" | bc)
		#echo "$value${line[$i+2]}->diff:$diff"
	fi
done
echo $diff
}

echo "in file: $2"
file=$2
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
  out_f="${2%.*}[$str_value]$suffix"
  echo "parameter: $str_value"
  if [ "$type" == "a" ]; then
		output=$(ffmpeg -i "$2" -filter:a "volume=$str_value" -y "$out_f" 2>&1)
  else
	if [ "$type" == "v" ]; then
		output=$(ffmpeg -i "$2" -r 30 -s 352*288 -acodec aac -filter:a "volume=$str_value" -y "$out_f" 2>&1)
	fi
  fi
  file=$out_f
  diff=$(diff_db)
  echo "diff: ${diff}dB"
  echo '------'
  [ "$diff" != "0" ]
do true; done
