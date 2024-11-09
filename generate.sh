#!/bin/bash

# Check if a file argument is provided
if [ "$#" -ne 1 ]; then
    echo "Usage: $0 <path_to_folders.txt>"
    exit 1
fi

# Path to the text file containing folder structure
FILE="$1"
# Get the directory of the provided file
BASE_DIR="$(dirname "$FILE")/generated_folders"  # Create generated_folders in the same directory as the file
mkdir -p "$BASE_DIR"  # Create the base directory if it doesn't exist

# Initialize variables to track folder depth and paths
declare -a folder_paths  # Array to keep track of nested folder paths

# Read the folders file line by line
while IFS= read -r line; do
    # Count leading spaces (indentation level) to determine folder depth
    depth=$(echo "$line" | sed -E 's/^([ ]*).*/\1/' | wc -c)
    depth=$((depth / 4))  # Assuming each indentation level is 4 spaces

    # Remove leading/trailing whitespace from line to get folder name
    folder_name=$(echo "$line" | xargs)

    # Update the path for the current depth level
    folder_paths[$depth]="$folder_name"

    # Construct the full path by joining folder_paths up to the current depth
    full_path="$BASE_DIR"
    for ((i = 0; i <= depth; i++)); do
        full_path="$full_path/${folder_paths[$i]}"
    done

    # Create the directory
    mkdir -p "$full_path"
    echo "Created: $full_path"

done < "$FILE"

echo "All folders and subfolders have been created."