# ============================================================
# FILE: CH09 - File Handling / 04 - Working with CSV.py
# ============================================================

# ------------------------------------------------------------
# WHAT IS CSV?
# ------------------------------------------------------------
# CSV = Comma Separated Values
#
# Example:
# name,age,score
# Ali,20,80
# John,21,90
#
# Used in:
# - Excel
# - data analysis
# - databases
# ------------------------------------------------------------


# ------------------------------------------------------------
# IMPORT CSV MODULE
# ------------------------------------------------------------

import csv


# ------------------------------------------------------------
# WRITING TO CSV FILE
# ------------------------------------------------------------

#newline="" is important to avoid extra blank lines on Windows
with open("CH09 - File Handling/04 - Data.csv", "w", newline="") as file:
    writer = csv.writer(file)

    # Write header
    writer.writerow(["Name", "Age", "Score"])

    # Write rows
    writer.writerow(["Ali", 20, 80])
    writer.writerow(["John", 21, 90])


# ------------------------------------------------------------
# READING CSV FILE
# ------------------------------------------------------------

with open("CH09 - File Handling/04 - Data.csv", "r") as file:
    reader = csv.reader(file)

    for row in reader:
        print(row)


# ------------------------------------------------------------
# SKIP HEADER (IMPORTANT)
# ------------------------------------------------------------

with open("CH09 - File Handling/04 - Data.csv", "r") as file:
    reader = csv.reader(file)

    next(reader)   # skip first row (header)

    for row in reader:
        print("Name:", row[0], "Score:", row[2])


# ------------------------------------------------------------
# USING DICTIONARY READER (VERY USEFUL)
# ------------------------------------------------------------

with open("CH09 - File Handling/04 - Data.csv", "r") as file:
    reader = csv.DictReader(file)

    for row in reader:
        print(row["Name"], row["Score"])


# ------------------------------------------------------------
# APPENDING TO CSV
# ------------------------------------------------------------

with open("CH09 - File Handling/04 - Data.csv", "a", newline="") as file:
    writer = csv.writer(file)

    writer.writerow(["Mei", 22, 85])


# ------------------------------------------------------------
# PRACTICAL EXAMPLE
# ------------------------------------------------------------

name = input("Enter name: ")
age = input("Enter age: ")
score = input("Enter score: ")

with open("CH09 - File Handling/04 - Data.csv", "a", newline="") as file:
    writer = csv.writer(file)
    writer.writerow([name, age, score])


# ------------------------------------------------------------
# COMMON BEGINNER MISTAKES
# ------------------------------------------------------------

# ❌ Forget newline="" (extra blank lines)

# ❌ Wrong column index

# ❌ Missing header


# ------------------------------------------------------------
# DEBUG TIP
# ------------------------------------------------------------

print("DEBUG: CSV processing completed")


# ------------------------------------------------------------
# MINI PRACTICE
# ------------------------------------------------------------
# Try this:

# with open("CH09 - File Handling/04 - Data.csv", "r") as file:
#     reader = csv.DictReader(file)
#
#     for row in reader:
#         if int(row["Score"]) > 80:
#             print(row["Name"])


# ------------------------------------------------------------
# END OF FILE
# ------------------------------------------------------------
# You now understand CSV handling 🎯🔥
# This is used in real-world data systems
# ------------------------------------------------------------