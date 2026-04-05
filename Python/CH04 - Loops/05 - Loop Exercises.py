# ============================================================
# FILE: CH04 - Loops / 05 - Loop Exercises.py
# ============================================================

# ------------------------------------------------------------
# PURPOSE OF THIS FILE
# ------------------------------------------------------------
# This file contains PRACTICE exercises
# combining:
# - for loop
# - while loop
# - if condition
# - break / continue
#
# Try to understand and modify each example
# ------------------------------------------------------------


# ------------------------------------------------------------
# EXERCISE 1: SUM OF NUMBERS
# ------------------------------------------------------------

total = 0

for i in range(1, 6):   # 1 to 5
    total += i

print("Sum =", total)   # 15


# ------------------------------------------------------------
# EXERCISE 2: COUNT EVEN NUMBERS
# ------------------------------------------------------------

count = 0

for i in range(1, 11):
    if i % 2 == 0:
        count += 1

print("Even numbers count:", count)


# ------------------------------------------------------------
# EXERCISE 3: MULTIPLICATION TABLE
# ------------------------------------------------------------

num = int(input("Enter a number: "))

for i in range(1, 11):
    print(num, "x", i, "=", num * i)


# ------------------------------------------------------------
# EXERCISE 4: NUMBER GUESSING GAME
# ------------------------------------------------------------

secret = 7
guess = 0

while guess != secret:
    guess = int(input("Guess the number (1-10): "))

    if guess == secret:
        print("Correct!")
    else:
        print("Try again")


# ------------------------------------------------------------
# EXERCISE 5: BREAK EXAMPLE
# ------------------------------------------------------------

for i in range(10):
    if i == 6:
        print("Stopping at", i)
        break
    print(i)


# ------------------------------------------------------------
# EXERCISE 6: CONTINUE EXAMPLE
# ------------------------------------------------------------

for i in range(1, 11):
    if i % 3 == 0:
        continue
    print(i)


# ------------------------------------------------------------
# EXERCISE 7: PASSWORD ATTEMPTS (LIMITED)
# ------------------------------------------------------------

correct_password = "1234"
attempts = 0

while attempts < 3:
    password = input("Enter password: ")

    if password == correct_password:
        print("Access granted")
        break
    else:
        print("Wrong password")

    attempts += 1

if attempts == 3:
    print("Too many attempts")


# ------------------------------------------------------------
# EXERCISE 8: PATTERN
# ------------------------------------------------------------

rows = 5

for i in range(1, rows + 1):
    print("*" * i)


# ------------------------------------------------------------
# EXERCISE 9: SUM UNTIL USER STOPS
# ------------------------------------------------------------

total = 0

while True:
    num = input("Enter number (or 'q' to quit): ")

    if num == "q":
        break

    total += int(num)

print("Total sum:", total)


# ------------------------------------------------------------
# EXERCISE 10: FIND MAX NUMBER
# ------------------------------------------------------------

numbers = [10, 45, 23, 67, 12]

max_num = numbers[0]

for num in numbers:
    if num > max_num:
        max_num = num

print("Maximum number:", max_num)


# ------------------------------------------------------------
# CHALLENGE (TRY YOURSELF)
# ------------------------------------------------------------
# 1. Print numbers from 1 to 100, but:
#    - skip multiples of 5
#    - stop at 80
#
# 2. Create a loop that asks user input until they enter "exit"
#
# 3. Print a triangle pattern using nested loops


# ------------------------------------------------------------
# END OF FILE
# ------------------------------------------------------------
# If you can understand this file,
# you have MASTERED loops 🎯🔥
# ------------------------------------------------------------