# ============================================================
# FILE: CH09 - File Handling / 02 - Writing Files.py
# ============================================================

# ------------------------------------------------------------
# WHAT IS WRITING FILES?
# ------------------------------------------------------------
# Writing files allows your program to:
# - save data
# - create files
# - overwrite existing files
# ------------------------------------------------------------


# ------------------------------------------------------------
# WRITE MODE ("w")
# ------------------------------------------------------------
# - creates file if not exist
# - OVERWRITES existing content

with open("CH09 - File Handling/02 - Output.txt", "w") as file:
    file.write("Hello, this is my first file.\n")
    file.write("Learning Python is fun!\n")


# ------------------------------------------------------------
# IMPORTANT WARNING
# ------------------------------------------------------------
# "w" mode will DELETE existing content
# Always be careful
# ------------------------------------------------------------


# ------------------------------------------------------------
# APPEND MODE ("a")
# ------------------------------------------------------------
# - adds content to existing file
# - does NOT overwrite

with open("CH09 - File Handling/02 - Output.txt", "a") as file:
    file.write("This line is appended.\n")


# ------------------------------------------------------------
# WRITE MULTIPLE LINES
# ------------------------------------------------------------

lines = ["Line 1\n", "Line 2\n", "Line 3\n"]

with open("CH09 - File Handling/02 - Output2.txt", "w") as file:
    file.writelines(lines)


# ------------------------------------------------------------
# WRITING USER INPUT TO FILE
# ------------------------------------------------------------

name = input("Enter your name: ")

with open("CH09 - File Handling/02 - Users.txt", "a") as file:
    file.write(name + "\n")


# ------------------------------------------------------------
# COMBINING READ + WRITE
# ------------------------------------------------------------

with open("CH09 - File Handling/02 - Output2.txt", "r") as file:
    content = file.read()

with open("CH09 - File Handling/02 - Copy.txt", "w") as file:
    file.write(content)


# ------------------------------------------------------------
# COMMON BEGINNER MISTAKES
# ------------------------------------------------------------

# ❌ Using "w" and losing data

# ❌ Forget newline (\n)

# ❌ Wrong file path
 

# ------------------------------------------------------------
# DEBUG TIP
# ------------------------------------------------------------

print("DEBUG: File writing completed")


# ------------------------------------------------------------
# MINI PRACTICE
# ------------------------------------------------------------
# Try this:

# with open("CH09 - File Handling/notes.txt", "w") as file:
#     file.write("My first note\n")
#
# with open("CH09 - File Handling/notes.txt", "a") as file:
#     file.write("Another note\n")


# ------------------------------------------------------------
# END OF FILE
# ------------------------------------------------------------
# You now know how to write files 🎯🔥
# Your program can now store real data
# ------------------------------------------------------------