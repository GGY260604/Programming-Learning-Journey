# ============================================================
# FILE: CH04 - Loops / 02 - While Loop.py
# ============================================================

# ------------------------------------------------------------
# WHAT IS A WHILE LOOP?
# ------------------------------------------------------------
# A while loop runs as long as a condition is TRUE
#
# Syntax:
#
# while condition:
#     code to repeat
# ------------------------------------------------------------


# ------------------------------------------------------------
# BASIC EXAMPLE
# ------------------------------------------------------------

count = 0

while count < 5:
    print("Count:", count)
    count += 1   # IMPORTANT: update variable


# ------------------------------------------------------------
# HOW IT WORKS
# ------------------------------------------------------------
# Step 1: Check condition
# Step 2: If TRUE → run code
# Step 3: Repeat until FALSE
# ------------------------------------------------------------


# ------------------------------------------------------------
# INFINITE LOOP (IMPORTANT WARNING)
# ------------------------------------------------------------
# If condition never becomes False → infinite loop

# ❌ Example (DO NOT RUN):
# while True:
#     print("This runs forever")

# Always make sure condition will eventually become False


# ------------------------------------------------------------
# USING INPUT (REAL EXAMPLE)
# ------------------------------------------------------------

password = ""

while password != "1234":
    password = input("Enter password: ")

print("Access granted")


# ------------------------------------------------------------
# COUNTER CONTROL LOOP
# ------------------------------------------------------------

i = 1

while i <= 5:
    print("Number:", i)
    i += 1


# ------------------------------------------------------------
# LOOP WITH BOOLEAN FLAG
# ------------------------------------------------------------

running = True

while running:
    command = input("Enter command (exit to stop): ")

    if command == "exit":
        running = False

print("Program ended")


# ------------------------------------------------------------
# COMMON BEGINNER MISTAKES
# ------------------------------------------------------------

# ❌ Forget to update variable → infinite loop

# ❌ Wrong condition
# while i > 0:
#     i += 1   <-- never stops

# ❌ Using = instead of ==
# while password = "1234"   <-- ERROR


# ------------------------------------------------------------
# DEBUG TIP
# ------------------------------------------------------------

i = 0

while i < 3:
    print("DEBUG i =", i)
    i += 1


# ------------------------------------------------------------
# MINI PRACTICE
# ------------------------------------------------------------
# Try this:

# num = 1
#
# while num <= 10:
#     print(num)
#     num += 1


# ------------------------------------------------------------
# END OF FILE
# ------------------------------------------------------------
# You now understand while loop 🎯
# This is powerful for dynamic conditions 🔥
# ------------------------------------------------------------