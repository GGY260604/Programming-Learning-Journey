# ============================================================
# FILE: CH05 - Data Structures (Basic) / 02 - List Operations.py
# ============================================================

# ------------------------------------------------------------
# WHAT ARE LIST OPERATIONS?
# ------------------------------------------------------------
# These are advanced ways to manipulate lists:
# - slicing
# - sorting
# - copying
# - joining lists
# ------------------------------------------------------------


# ------------------------------------------------------------
# LIST SLICING (VERY IMPORTANT)
# ------------------------------------------------------------
# Syntax:
# list[start:end]

numbers = [10, 20, 30, 40, 50]

print(numbers[1:4])   # [20, 30, 40]
print(numbers[:3])    # [10, 20, 30]
print(numbers[2:])    # [30, 40, 50]
print(numbers[-3:])   # [30, 40, 50]


# ------------------------------------------------------------
# SLICING WITH STEP
# ------------------------------------------------------------

print(numbers[::2])   # [10, 30, 50]
print(numbers[::-1])  # reverse list


# ------------------------------------------------------------
# SORTING LIST
# ------------------------------------------------------------

nums = [5, 2, 9, 1]

nums.sort()   # ascending
print(nums)

nums.sort(reverse=True)   # descending
print(nums)


# ------------------------------------------------------------
# COPYING LIST (IMPORTANT)
# ------------------------------------------------------------

original = [1, 2, 3]

# ❌ Wrong (both refer to same list)
copy1 = original

# ✅ Correct copy
copy2 = original.copy()

original.append(4)

print("Original:", original)
print("Copy1:", copy1)   # also changed!
print("Copy2:", copy2)   # separate list


# ------------------------------------------------------------
# JOINING LISTS
# ------------------------------------------------------------

list1 = [1, 2]
list2 = [3, 4]

combined = list1 + list2
print(combined)


# ------------------------------------------------------------
# EXTEND LIST
# ------------------------------------------------------------

list1.extend(list2)
print(list1)


# ------------------------------------------------------------
# FINDING ELEMENT INDEX
# ------------------------------------------------------------

nums = [10, 20, 30]

print(nums.index(20))   # 1


# ------------------------------------------------------------
# COUNT ELEMENTS
# ------------------------------------------------------------

nums = [1, 2, 2, 3]

print(nums.count(2))   # 2


# ------------------------------------------------------------
# CLEAR LIST
# ------------------------------------------------------------

nums.clear()
print(nums)   # []


# ------------------------------------------------------------
# COMMON BEGINNER MISTAKES
# ------------------------------------------------------------

# ❌ Forget slicing excludes end index
# [1:4] → includes index 1,2,3 (not 4)

# ❌ Copy mistake (shared reference)


# ------------------------------------------------------------
# DEBUG TIP
# ------------------------------------------------------------

test = [3, 1, 2]
print("Before sort:", test)

test.sort()
print("After sort:", test)


# ------------------------------------------------------------
# MINI PRACTICE
# ------------------------------------------------------------
# Try this:

# nums = [5, 3, 8, 1]
#
# nums.sort()
# print(nums)
#
# print(nums[::-1])   # reverse
#
# copy_nums = nums.copy()
# print(copy_nums)


# ------------------------------------------------------------
# END OF FILE
# ------------------------------------------------------------
# You now mastered list operations 🎯
# Lists are extremely powerful in real applications 🔥
# ------------------------------------------------------------