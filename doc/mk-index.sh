#!/bin/sh

cd "$(dirname "$0")"

php5 index.template.php > ../index.html
