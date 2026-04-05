# ============================================================
# FILE: CH09 - File Handling / 03 - Appending Files.py
# ============================================================

# ------------------------------------------------------------
# WHAT IS APPENDING?
# ------------------------------------------------------------
# Appending means adding new data WITHOUT deleting old data
#
# Mode: "a"
# ------------------------------------------------------------


# ------------------------------------------------------------
# BASIC APPEND
# ------------------------------------------------------------

with open("CH09 - File Handling/03 - Log.txt", "a") as file:
    file.write("New log entry\n")


# ------------------------------------------------------------
# WHY APPEND IS IMPORTANT?
# ------------------------------------------------------------
# Used in:
# - logging systems
# - saving user data
# - transaction records
# ------------------------------------------------------------


# ------------------------------------------------------------
# APPENDING USER INPUT
# ------------------------------------------------------------

name = input("Enter your name: ")

with open("CH09 - File Handling/03 - Users.txt", "a") as file:
    file.write(name + "\n")


# ------------------------------------------------------------
# APPEND MULTIPLE ENTRIES
# ------------------------------------------------------------

entries = ["Entry 1\n", "Entry 2\n"]

with open("CH09 - File Handling/03 - Log.txt", "a") as file:
    file.writelines(entries)


# ------------------------------------------------------------
# CHECK FILE CONTENT AFTER APPEND
# ------------------------------------------------------------

with open("CH09 - File Handling/03 - Log.txt", "r") as file:
    print(file.read())


# ------------------------------------------------------------
# AUTO-CREATE FILE
# ------------------------------------------------------------
# If file doesn't exist, "a" mode will create it

with open("CH09 - File Handling/03 - NewFile.txt", "a") as file:
    file.write("File created automatically\n")


# ------------------------------------------------------------
# APPEND WITH TIMESTAMP (REAL EXAMPLE)
# ------------------------------------------------------------

from datetime import datetime

with open("CH09 - File Handling/03 - Log.txt", "a") as file:
    time = datetime.now()
    file.write(f"{time} - User logged in\n")


# ------------------------------------------------------------
# COMMON BEGINNER MISTAKES
# ------------------------------------------------------------

# ❌ Forget newline → data sticks together

# ❌ Using "w" instead of "a" → data lost

# ❌ Not checking file content


# ------------------------------------------------------------
# DEBUG TIP
# ------------------------------------------------------------

print("DEBUG: Appending completed")


# ------------------------------------------------------------
# MINI PRACTICE
# ------------------------------------------------------------
# Try this:

# while True:
#     text = input("Enter message (or 'exit'): ")
#
#     if text == "exit":
#         break
#
#     with open("CH09 - File Handling/03 - Chat.txt", "a") as file:
#         file.write(text + "\n")


# ------------------------------------------------------------
# END OF FILE
# ------------------------------------------------------------
# You now understand appending 🎯🔥
# This is used in real-world logging and data tracking
# ------------------------------------------------------------