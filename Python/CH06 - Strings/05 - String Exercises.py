# ============================================================
# FILE: CH06 - Strings / 05 - String Exercises.py
# ============================================================

# ------------------------------------------------------------
# PURPOSE OF THIS FILE
# ------------------------------------------------------------
# Practice combining:
# - string methods
# - slicing
# - input handling
# - conditions
# - f-strings
# ------------------------------------------------------------


# ------------------------------------------------------------
# EXERCISE 1: REVERSE STRING
# ------------------------------------------------------------

text = input("Enter a word: ")

reversed_text = text[::-1]
print(f"Reversed: {reversed_text}")


# ------------------------------------------------------------
# EXERCISE 2: COUNT VOWELS
# ------------------------------------------------------------

text = input("Enter text: ").lower()

count = 0

for char in text:
    if char in "aeiou":
        count += 1

print(f"Number of vowels: {count}")


# ------------------------------------------------------------
# EXERCISE 3: CHECK PALINDROME
# ------------------------------------------------------------
# Palindrome = same forward and backward

word = input("Enter word: ")

if word == word[::-1]:
    print("Palindrome")
else:
    print("Not palindrome")


# ------------------------------------------------------------
# EXERCISE 4: EMAIL VALIDATION (BASIC)
# ------------------------------------------------------------

email = input("Enter email: ").strip()

if "@" in email and email.endswith(".com"):
    print("Valid email")
else:
    print("Invalid email")


# ------------------------------------------------------------
# EXERCISE 5: FORMAT NAME
# ------------------------------------------------------------

name = input("Enter your name: ").strip()

print(f"Upper: {name.upper()}")
print(f"Lower: {name.lower()}")
print(f"Title: {name.title()}")


# ------------------------------------------------------------
# EXERCISE 6: WORD COUNT
# ------------------------------------------------------------

sentence = input("Enter a sentence: ")

words = sentence.split()
print(f"Number of words: {len(words)}")


# ------------------------------------------------------------
# EXERCISE 7: MASK PASSWORD
# ------------------------------------------------------------

password = input("Enter password: ")

masked = "*" * len(password)
print(f"Masked: {masked}")


# ------------------------------------------------------------
# EXERCISE 8: EXTRACT DOMAIN
# ------------------------------------------------------------

email = input("Enter email: ")

domain = email[email.find("@") + 1:]
print(f"Domain: {domain}")


# ------------------------------------------------------------
# EXERCISE 9: REMOVE SPACES
# ------------------------------------------------------------

text = input("Enter text: ")

cleaned = text.replace(" ", "")
print(f"No spaces: {cleaned}")


# ------------------------------------------------------------
# EXERCISE 10: CAPITALIZE FIRST LETTER
# ------------------------------------------------------------

sentence = input("Enter sentence: ")

print(sentence.capitalize())


# ------------------------------------------------------------
# CHALLENGE (TRY YOURSELF)
# ------------------------------------------------------------
# 1. Check if a string contains only numbers
# 2. Count how many times a letter appears
# 3. Replace all vowels with "*"
# 4. Extract username from email
#    (before @)


# ------------------------------------------------------------
# END OF FILE
# ------------------------------------------------------------
# If you can understand this file,
# you MASTERED strings 🎯🔥
# ------------------------------------------------------------