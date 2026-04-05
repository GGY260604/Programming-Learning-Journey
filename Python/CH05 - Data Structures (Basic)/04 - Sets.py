# ============================================================
# FILE: CH05 - Data Structures (Basic) / 04 - Sets.py
# ============================================================

# ------------------------------------------------------------
# WHAT IS A SET?
# ------------------------------------------------------------
# A set is a collection of UNIQUE values
#
# Properties:
# - unordered
# - no duplicates
# - mutable (can add/remove)
#
# Uses { } (but NOT key:value like dictionary)
# ------------------------------------------------------------


# ------------------------------------------------------------
# CREATING A SET
# ------------------------------------------------------------

numbers = {1, 2, 3, 4}
print(numbers)

# Duplicate values are automatically removed
nums = {1, 2, 2, 3, 3, 4}
print(nums)   # {1, 2, 3, 4}


# ------------------------------------------------------------
# EMPTY SET (IMPORTANT)
# ------------------------------------------------------------

empty_set = set()   # correct

# ❌ Wrong:
# empty = {}   # this creates a dictionary


# ------------------------------------------------------------
# ADDING ELEMENTS
# ------------------------------------------------------------

numbers.add(5)
print(numbers)


# ------------------------------------------------------------
# REMOVING ELEMENTS
# ------------------------------------------------------------

numbers.remove(3)   # error if not found
print(numbers)

numbers.discard(10)   # safe (no error if not found)
print(numbers)


# ------------------------------------------------------------
# LOOP THROUGH SET
# ------------------------------------------------------------

for num in numbers:
    print(num)


# ------------------------------------------------------------
# CHECKING VALUE
# ------------------------------------------------------------

print(2 in numbers)   # True or False


# ------------------------------------------------------------
# SET OPERATIONS (VERY IMPORTANT)
# ------------------------------------------------------------

set1 = {1, 2, 3}
set2 = {3, 4, 5}

# Union (combine all)
print("Union:", set1 | set2)

# Intersection (common values)
print("Intersection:", set1 & set2)

# Difference (only in set1)
print("Difference:", set1 - set2)


# ------------------------------------------------------------
# CONVERT LIST → SET (REMOVE DUPLICATES)
# ------------------------------------------------------------

my_list = [1, 2, 2, 3, 3, 4]

unique = set(my_list)
print(unique)


# ------------------------------------------------------------
# COMMON BEGINNER MISTAKES
# ------------------------------------------------------------

# ❌ Trying to access by index
# numbers[0]   <-- ERROR (no index in set)

# ❌ Expecting order (sets are unordered)

# ❌ Using {} for empty set


# ------------------------------------------------------------
# DEBUG TIP
# ------------------------------------------------------------

test = {1, 2, 2, 3}
print("DEBUG:", test)


# ------------------------------------------------------------
# MINI PRACTICE
# ------------------------------------------------------------
# Try this:

# nums = [1, 2, 2, 3, 4, 4, 5]
#
# unique_nums = set(nums)
# print(unique_nums)
#
# for n in unique_nums:
#     print(n)


# ------------------------------------------------------------
# END OF FILE
# ------------------------------------------------------------
# You now understand sets 🎯
# Key idea: UNIQUE values + fast operations 🔥
# ------------------------------------------------------------