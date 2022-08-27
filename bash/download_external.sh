#!/bin/bash
mkdir -p uploads/
chmod +x bash/*
cd uploads/
wget -i external.list >/dev/null 2>/dev/null &
