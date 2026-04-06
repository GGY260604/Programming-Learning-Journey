# ============================================================
# FILE: CH13 - Working with Libraries / 03 - Datetime Module.py
# ============================================================

# ------------------------------------------------------------
# WHAT IS DATETIME MODULE?
# ------------------------------------------------------------
# Used to work with:
# - date
# - time
# - timestamps
# ------------------------------------------------------------


# ------------------------------------------------------------
# IMPORT DATETIME
# ------------------------------------------------------------

from datetime import datetime


# ------------------------------------------------------------
# CURRENT DATE & TIME
# ------------------------------------------------------------

now = datetime.now()

print("Current datetime:", now)
print("Year:", now.year)
print("Month:", now.month)
print("Day:", now.day)
print("Hour:", now.hour)
print("Minute:", now.minute)


# ------------------------------------------------------------
# FORMAT DATE (VERY IMPORTANT)
# ------------------------------------------------------------

formatted = now.strftime("%Y-%m-%d %H:%M:%S")

print("Formatted:", formatted)


# ------------------------------------------------------------
# CREATE CUSTOM DATE
# ------------------------------------------------------------

custom_date = datetime(2025, 1, 1)

print("Custom date:", custom_date)


# ------------------------------------------------------------
# DATE CALCULATION
# ------------------------------------------------------------

from datetime import timedelta

future = now + timedelta(days=7)
past = now - timedelta(days=3)

print("Future date:", future)
print("Past date:", past)


# ------------------------------------------------------------
# DIFFERENCE BETWEEN DATES
# ------------------------------------------------------------

date1 = datetime(2026, 1, 1)
date2 = datetime(2025, 1, 1)

difference = date1 - date2

print("Days difference:", difference.days)


# ------------------------------------------------------------
# PRACTICAL EXAMPLE (LOGGING)
# ------------------------------------------------------------

with open("CH13 - Working with Libraries/03 - Log.txt", "a") as file:
    file.write(f"{datetime.now()} - User logged in\n")


# ------------------------------------------------------------
# COMMON FORMAT CODES
# ------------------------------------------------------------
# %Y → year
# %m → month
# %d → day
# %H → hour
# %M → minute
# %S → second
# ------------------------------------------------------------


# ------------------------------------------------------------
# COMMON BEGINNER MISTAKES
# ------------------------------------------------------------

# ❌ Forget import datetime

# ❌ Wrong format string

# ❌ Mixing string and datetime


# ------------------------------------------------------------
# DEBUG TIP
# ------------------------------------------------------------

print("DEBUG current time:", now)


# ------------------------------------------------------------
# MINI PRACTICE
# ------------------------------------------------------------
# Try this:

# from datetime import datetime
#
# now = datetime.now()
# print(now.strftime("%d/%m/%Y"))


# ------------------------------------------------------------
# END OF FILE
# ------------------------------------------------------------
# You now understand datetime 🎯🔥
# This is used in logging, scheduling, systems
# ------------------------------------------------------------