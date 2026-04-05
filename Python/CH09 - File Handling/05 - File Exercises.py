# ============================================================
# FILE: CH09 - File Handling / 05 - File Exercises.py
# ============================================================

# ------------------------------------------------------------
# PURPOSE OF THIS FILE
# ------------------------------------------------------------
# Practice combining:
# - reading files
# - writing files
# - appending
# - CSV handling
# - loops + conditions
# ------------------------------------------------------------


# ------------------------------------------------------------
# EXERCISE 1: CREATE AND WRITE FILE
# ------------------------------------------------------------

with open("CH09 - File Handling/05 - Notes.txt", "w") as file:
    file.write("Learning Python\n")
    file.write("File handling is important\n")


# ------------------------------------------------------------
# EXERCISE 2: READ FILE
# ------------------------------------------------------------

with open("CH09 - File Handling/05 - Notes.txt", "r") as file:
    print(file.read())


# ------------------------------------------------------------
# EXERCISE 3: APPEND DATA
# ------------------------------------------------------------

with open("CH09 - File Handling/05 - Notes.txt", "a") as file:
    file.write("Appending new line\n")


# ------------------------------------------------------------
# EXERCISE 4: COUNT LINES
# ------------------------------------------------------------

count = 0

with open("CH09 - File Handling/05 - Notes.txt", "r") as file:
    for line in file:
        count += 1

print("Total lines:", count)


# ------------------------------------------------------------
# EXERCISE 5: COPY FILE
# ------------------------------------------------------------

with open("CH09 - File Handling/05 - Notes.txt", "r") as source:
    content = source.read()

with open("CH09 - File Handling/05 - Backup.txt", "w") as target:
    target.write(content)


# ------------------------------------------------------------
# EXERCISE 6: SEARCH WORD IN FILE
# ------------------------------------------------------------

keyword = input("Enter word to search: ")

with open("CH09 - File Handling/05 - Notes.txt", "r") as file:
    for line in file:
        if keyword in line:
            print("Found:", line.strip())


# ------------------------------------------------------------
# EXERCISE 7: SAVE USER DATA (CSV)
# ------------------------------------------------------------

import csv

name = input("Name: ")
age = input("Age: ")

with open("CH09 - File Handling/05 - Users.csv", "a", newline="") as file:
    writer = csv.writer(file)
    writer.writerow([name, age])


# ------------------------------------------------------------
# EXERCISE 8: READ CSV AND FILTER
# ------------------------------------------------------------

with open("CH09 - File Handling/05 - Users.csv", "r") as file:
    reader = csv.reader(file)

    for row in reader:
        if int(row[1]) > 20:
            print("Age > 20:", row)


# ------------------------------------------------------------
# EXERCISE 9: LOG SYSTEM
# ------------------------------------------------------------

from datetime import datetime

log = input("Enter log message: ")

with open("CH09 - File Handling/05 - Log.txt", "a") as file:
    file.write(f"{datetime.now()} - {log}\n")


# ------------------------------------------------------------
# EXERCISE 10: SIMPLE DATABASE
# ------------------------------------------------------------

users = []

while True:
    name = input("Enter name (or 'exit'): ")

    if name == "exit":
        break

    users.append(name)

with open("CH09 - File Handling/05 - Database.txt", "w") as file:
    for user in users:
        file.write(user + "\n")


# ------------------------------------------------------------
# CHALLENGE (TRY YOURSELF)
# ------------------------------------------------------------
# 1. Count how many times a word appears in file
# 2. Save multiple users into CSV with score
# 3. Find highest score from CSV
# 4. Build simple login system using file


# ------------------------------------------------------------
# END OF FILE
# ------------------------------------------------------------
# If you understand this file,
# you MASTERED file handling 🎯🔥
# ------------------------------------------------------------