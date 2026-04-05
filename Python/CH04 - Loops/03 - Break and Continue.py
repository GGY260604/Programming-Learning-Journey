# ============================================================
# FILE: CH04 - Loops / 03 - Break and Continue.py
# ============================================================

# ------------------------------------------------------------
# WHAT ARE BREAK AND CONTINUE?
# ------------------------------------------------------------
# They control loop behavior:
#
# break    → STOP the loop completely
# continue → SKIP current iteration
# ------------------------------------------------------------


# ------------------------------------------------------------
# BREAK EXAMPLE
# ------------------------------------------------------------
# Stops loop when condition is met

for i in range(10):
    if i == 5:
        break
    print(i)

# Output: 0 1 2 3 4


# ------------------------------------------------------------
# CONTINUE EXAMPLE
# ------------------------------------------------------------
# Skips current iteration

for i in range(5):
    if i == 2:
        continue
    print(i)

# Output: 0 1 3 4


# ------------------------------------------------------------
# BREAK WITH WHILE LOOP
# ------------------------------------------------------------

while True:
    command = input("Enter 'exit' to stop: ")

    if command == "exit":
        break

    print("You entered:", command)

print("Loop ended")


# ------------------------------------------------------------
# CONTINUE WITH WHILE LOOP
# ------------------------------------------------------------

i = 0

while i < 5:
    i += 1

    if i == 3:
        continue

    print(i)

# Output: 1 2 4 5


# ------------------------------------------------------------
# PRACTICAL EXAMPLE (FILTERING)
# ------------------------------------------------------------

for i in range(1, 11):
    if i % 2 == 0:
        continue   # skip even numbers
    print("Odd:", i)


# ------------------------------------------------------------
# SEARCH EXAMPLE (BREAK)
# ------------------------------------------------------------

numbers = [10, 20, 30, 40]

for num in numbers:
    if num == 30:
        print("Found:", num)
        break


# ------------------------------------------------------------
# COMMON BEGINNER MISTAKES
# ------------------------------------------------------------

# ❌ Using break outside loop → ERROR

# ❌ Infinite loop with continue
# while True:
#     continue   <-- no exit


# ------------------------------------------------------------
# DEBUG TIP
# ------------------------------------------------------------

for i in range(5):
    print("DEBUG before:", i)

    if i == 3:
        print("Skipping 3")
        continue

    print("DEBUG after:", i)


# ------------------------------------------------------------
# MINI PRACTICE
# ------------------------------------------------------------
# Try this:

# for i in range(1, 11):
#     if i == 5:
#         break
#     print(i)

# Skip multiples of 3:

# for i in range(1, 11):
#     if i % 3 == 0:
#         continue
#     print(i)


# ------------------------------------------------------------
# END OF FILE
# ------------------------------------------------------------
# You can now control loops like a pro 🎯
# This is used in real-world logic everywhere 🔥
# ------------------------------------------------------------