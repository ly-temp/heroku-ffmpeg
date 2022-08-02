#!/bin/bash
#input [infile] [format]
[[ $2 = .* ]] && suffix="$2" || suffix=".""$2"
out_f="${1%.*}$suffix"
ffmpeg -i "$1" "$out_f"
$(printf "$out_f\n" >> ../complete.list)
