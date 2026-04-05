# ============================================================
# FILE: CH04 - Loops / 04 - Nested Loops.py
# ============================================================

# ------------------------------------------------------------
# WHAT IS A NESTED LOOP?
# ------------------------------------------------------------
# A nested loop = a loop inside another loop
#
# Outer loop runs first
# Inner loop runs completely for EACH outer loop iteration
# ------------------------------------------------------------


# ------------------------------------------------------------
# BASIC EXAMPLE
# ------------------------------------------------------------

for i in range(3):          # outer loop
    for j in range(2):      # inner loop
        print("i =", i, "j =", j)


# ------------------------------------------------------------
# HOW IT WORKS (VERY IMPORTANT)
# ------------------------------------------------------------
# i = 0 → j runs 0,1
# i = 1 → j runs 0,1
# i = 2 → j runs 0,1
# ------------------------------------------------------------


# ------------------------------------------------------------
# MULTIPLICATION TABLE
# ------------------------------------------------------------

for i in range(1, 6):
    for j in range(1, 6):
        print(i * j, end="\t")   # \t for spacing
    print()   # new line after each row


# ------------------------------------------------------------
# PRINTING PATTERNS (VERY COMMON)
# ------------------------------------------------------------

# Pattern:
# *
# **
# ***
# ****

for i in range(1, 5):
    for j in range(i):
        print("*", end="")
    print()


# ------------------------------------------------------------
# REVERSED PATTERN
# ------------------------------------------------------------

# Pattern:
# ****
# ***
# **
# *

for i in range(4, 0, -1):
    for j in range(i):
        print("*", end="")
    print()


# ------------------------------------------------------------
# LOOP THROUGH 2D STRUCTURE (PREVIEW)
# ------------------------------------------------------------

matrix = [
    [1, 2, 3],
    [4, 5, 6],
    [7, 8, 9]
]

for row in matrix:
    for value in row:
        print(value, end=" ")
    print()


# ------------------------------------------------------------
# COMMON BEGINNER MISTAKES
# ------------------------------------------------------------

# ❌ Confusing outer vs inner loop

# ❌ Forget indentation

# ❌ Printing without end="" (messy output)


# ------------------------------------------------------------
# DEBUG TIP
# ------------------------------------------------------------

for i in range(2):
    print("Outer loop i =", i)

    for j in range(2):
        print("   Inner loop j =", j)


# ------------------------------------------------------------
# MINI PRACTICE
# ------------------------------------------------------------
# Try this:

# Print square pattern:

# for i in range(4):
#     for j in range(4):
#         print("#", end="")
#     print()


# ------------------------------------------------------------
# END OF FILE
# ------------------------------------------------------------
# You now understand nested loops 🎯
# This is used in grids, games, data processing 🔥
# ------------------------------------------------------------