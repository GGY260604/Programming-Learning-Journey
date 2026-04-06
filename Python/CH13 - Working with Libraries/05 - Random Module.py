# ============================================================
# FILE: CH13 - Working with Libraries / 05 - Random Module.py
# ============================================================

# ------------------------------------------------------------
# WHAT IS RANDOM MODULE?
# ------------------------------------------------------------
# The random module allows you to:
# - generate random numbers
# - select random items
# - shuffle data
# ------------------------------------------------------------


# ------------------------------------------------------------
# IMPORT RANDOM
# ------------------------------------------------------------

import random


# ------------------------------------------------------------
# RANDOM INTEGER
# ------------------------------------------------------------

num = random.randint(1, 10)
print("Random integer:", num)


# ------------------------------------------------------------
# RANDOM FLOAT
# ------------------------------------------------------------

print("Random float:", random.random())   # 0.0 to 1.0


# ------------------------------------------------------------
# RANDOM CHOICE
# ------------------------------------------------------------

fruits = ["apple", "banana", "orange"]

choice = random.choice(fruits)
print("Random fruit:", choice)


# ------------------------------------------------------------
# RANDOM SAMPLE (NO REPEAT)
# ------------------------------------------------------------

nums = [1, 2, 3, 4, 5]

sample = random.sample(nums, 3)
print("Random sample:", sample)


# ------------------------------------------------------------
# SHUFFLE LIST
# ------------------------------------------------------------

cards = ["A", "K", "Q", "J"]

random.shuffle(cards)
print("Shuffled cards:", cards)


# ------------------------------------------------------------
# RANDOM RANGE STEP
# ------------------------------------------------------------

print("Random even number:", random.randrange(0, 10, 2))


# ------------------------------------------------------------
# PRACTICAL EXAMPLE (PASSWORD GENERATOR)
# ------------------------------------------------------------

chars = "abcdefghijklmnopqrstuvwxyz123456789"

password = ""

for i in range(8):
    password += random.choice(chars)

print("Generated password:", password)


# ------------------------------------------------------------
# PRACTICAL EXAMPLE (DICE GAME)
# ------------------------------------------------------------

dice = random.randint(1, 6)

print("Dice rolled:", dice)


# ------------------------------------------------------------
# COMMON BEGINNER MISTAKES
# ------------------------------------------------------------

# ❌ Forget import random

# ❌ Using wrong function (randint vs random)

# ❌ Expecting repeatable results


# ------------------------------------------------------------
# DEBUG TIP
# ------------------------------------------------------------

random.seed(1)   # fixed result for testing
print("DEBUG:", random.randint(1, 10))


# ------------------------------------------------------------
# MINI PRACTICE
# ------------------------------------------------------------
# Try this:

# import random
#
# print(random.choice(["A", "B", "C"]))
# print(random.randint(1, 100))


# ------------------------------------------------------------
# END OF FILE
# ------------------------------------------------------------
# You now understand random module 🎯🔥
# This is used in games, simulations, and testing
# ------------------------------------------------------------