# ============================================================
# FILE: CH14 - Mini Projects / 05 - Number Guessing Game.py
# ============================================================

# ------------------------------------------------------------
# PROJECT: NUMBER GUESSING GAME
# ------------------------------------------------------------
# This program:
# - generates a random secret number
# - asks user to guess
# - gives hint: too high / too low
# - counts attempts
# - ends when user guesses correctly
# ------------------------------------------------------------


# ------------------------------------------------------------
# IMPORT RANDOM MODULE
# ------------------------------------------------------------
# We use random.randint() to generate a secret number
# ------------------------------------------------------------

import random


# ------------------------------------------------------------
# GENERATE SECRET NUMBER
# ------------------------------------------------------------
# randint(1, 10) means:
# generate a random integer from 1 to 10 (inclusive)
# ------------------------------------------------------------

secret_number = random.randint(1, 10)


# ------------------------------------------------------------
# SETUP GAME VARIABLES
# ------------------------------------------------------------
# attempts keeps track of how many guesses the user makes
# ------------------------------------------------------------

attempts = 0


# ------------------------------------------------------------
# WELCOME MESSAGE
# ------------------------------------------------------------

print("===================================")
print("      NUMBER GUESSING GAME         ")
print("===================================")
print("I am thinking of a number from 1 to 10.")
print("Try to guess it!")
print()


# ------------------------------------------------------------
# MAIN GAME LOOP
# ------------------------------------------------------------
# The loop keeps running until the correct number is guessed
# ------------------------------------------------------------

while True:
    try:
        guess = int(input("Enter your guess: "))
        attempts += 1

        if guess < secret_number:
            print("Too low. Try again.\n")

        elif guess > secret_number:
            print("Too high. Try again.\n")

        else:
            print(f"Correct! The number was {secret_number}.")
            print(f"You guessed it in {attempts} attempt(s).")
            break

    except ValueError:
        print("Invalid input. Please enter a whole number.\n")


# ------------------------------------------------------------
# OPTIONAL RANGE CHECK
# ------------------------------------------------------------
# If you want stricter control, you can check whether
# the number is within the allowed range
# ------------------------------------------------------------

# Example:
# if guess < 1 or guess > 10:
#     print("Please enter a number between 1 and 10.")
#     continue


# ------------------------------------------------------------
# DEBUG TIP
# ------------------------------------------------------------
# If you want to test quickly, you can print the secret number
# at the beginning, but normally keep it hidden.
# ------------------------------------------------------------

# print("DEBUG secret number:", secret_number)


# ------------------------------------------------------------
# MINI CHALLENGE
# ------------------------------------------------------------
# Try improving this project:
# - let user choose difficulty (1-10, 1-50, 1-100)
# - limit total attempts
# - ask user if they want to play again
# - save best score into a file
# ------------------------------------------------------------


# ------------------------------------------------------------
# END OF FILE
# ------------------------------------------------------------
# You built a number guessing game 🎯🔥
# This project combines random, loops, conditions, and input
# ------------------------------------------------------------