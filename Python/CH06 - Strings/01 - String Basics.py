# ============================================================
# FILE: CH06 - Strings / 01 - String Basics.py
# ============================================================

# ------------------------------------------------------------
# WHAT IS A STRING?
# ------------------------------------------------------------
# A string is a sequence of characters (text)
#
# Examples:
# "Hello"
# 'Python'
# ------------------------------------------------------------


# ------------------------------------------------------------
# CREATING STRINGS
# ------------------------------------------------------------

text1 = "Hello"
text2 = 'World'

print(text1)
print(text2)


# ------------------------------------------------------------
# MULTI-LINE STRING
# ------------------------------------------------------------

message = """This is a
multi-line
string"""

print(message)


# ------------------------------------------------------------
# STRING INDEXING
# ------------------------------------------------------------
# Each character has an index (starting from 0)

word = "Python"

print(word[0])   # P
print(word[1])   # y
print(word[-1])  # n (last character)


# ------------------------------------------------------------
# STRING SLICING
# ------------------------------------------------------------

print(word[0:3])   # Pyt
print(word[2:])    # thon
print(word[:4])    # Pyth
print(word[-3:])   # hon


# ------------------------------------------------------------
# STRING LENGTH
# ------------------------------------------------------------

print(len(word))   # 6


# ------------------------------------------------------------
# STRING IS IMMUTABLE
# ------------------------------------------------------------
# You cannot change characters directly

# ❌ This will cause error:
# word[0] = "J"

# ✅ Instead:
word = "Jython"
print(word)


# ------------------------------------------------------------
# LOOP THROUGH STRING
# ------------------------------------------------------------

for char in word:
    print(char)


# ------------------------------------------------------------
# CHECK CHARACTER IN STRING
# ------------------------------------------------------------

print("P" in word)   # True or False


# ------------------------------------------------------------
# COMMON BEGINNER MISTAKES
# ------------------------------------------------------------

# ❌ Index out of range
# print(word[10])

# ❌ Trying to modify string directly

# ❌ Forget quotes
# text = Hello   <-- ERROR


# ------------------------------------------------------------
# DEBUG TIP
# ------------------------------------------------------------

test = "Hello"
print("DEBUG:", test, len(test))


# ------------------------------------------------------------
# MINI PRACTICE
# ------------------------------------------------------------
# Try this:

# name = input("Enter your name: ")
#
# print("First letter:", name[0])
# print("Last letter:", name[-1])
# print("Length:", len(name))


# ------------------------------------------------------------
# END OF FILE
# ------------------------------------------------------------
# You now understand string basics 🎯
# Strings are used EVERYWHERE in programming 🔥
# ------------------------------------------------------------