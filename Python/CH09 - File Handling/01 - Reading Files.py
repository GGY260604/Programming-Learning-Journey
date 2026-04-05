# ============================================================
# FILE: CH09 - File Handling / 01 - Reading Files.py
# ============================================================

# ------------------------------------------------------------
# WHAT IS FILE HANDLING?
# ------------------------------------------------------------
# File handling allows your program to:
# - read data from files
# - write data to files
#
# Example files:
# .txt, .csv, .json
# ------------------------------------------------------------


# ------------------------------------------------------------
# OPENING A FILE (READ MODE)
# ------------------------------------------------------------
# Syntax:
# open("filename", "r")

# Make sure this file exists in your folder
# Create a file named: 01 - Sample.txt

file = open("CH09 - File Handling/01 - Sample.txt", "r")


# ------------------------------------------------------------
# READ ENTIRE FILE
# ------------------------------------------------------------

content = file.read()
print(content)

file.close()   # always close file


# ------------------------------------------------------------
# USING WITH (RECOMMENDED)
# ------------------------------------------------------------
# Automatically closes file

with open("CH09 - File Handling/01 - Sample.txt", "r") as file:
    content = file.read()
    print(content)


# ------------------------------------------------------------
# READ LINE BY LINE
# ------------------------------------------------------------

with open("CH09 - File Handling/01 - Sample.txt", "r") as file:
    for line in file:
        print(line.strip())   # remove newline


# ------------------------------------------------------------
# READ ONE LINE
# ------------------------------------------------------------

with open("CH09 - File Handling/01 - Sample.txt", "r") as file:
    line1 = file.readline()
    print("First line:", line1)


# ------------------------------------------------------------
# READ ALL LINES INTO LIST
# ------------------------------------------------------------

with open("CH09 - File Handling/01 - Sample.txt", "r") as file:
    lines = file.readlines()
    print(lines)


# ------------------------------------------------------------
# FILE NOT FOUND ERROR
# ------------------------------------------------------------

# ❌ If file does not exist:
# open("missing.txt", "r")   → ERROR


# ------------------------------------------------------------
# SAFE FILE READING (PREVIEW)
# ------------------------------------------------------------

try:
    with open("missing.txt", "r") as file:
        print(file.read())
except FileNotFoundError:
    print("File not found!")


# ------------------------------------------------------------
# COMMON BEGINNER MISTAKES
# ------------------------------------------------------------

# ❌ Forget to close file

# ❌ Wrong file path

# ❌ File does not exist


# ------------------------------------------------------------
# DEBUG TIP
# ------------------------------------------------------------

print("DEBUG: Current file reading completed")


# ------------------------------------------------------------
# MINI PRACTICE
# ------------------------------------------------------------
# 1. Create a file "data.txt"
# 2. Write some lines manually
# 3. Use Python to read and print them


# ------------------------------------------------------------
# END OF FILE
# ------------------------------------------------------------
# You now understand reading files 🎯
# This is the first step to handling real data 🔥
# ------------------------------------------------------------