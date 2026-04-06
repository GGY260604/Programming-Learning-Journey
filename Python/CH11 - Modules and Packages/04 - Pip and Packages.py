# ============================================================
# FILE: CH11 - Modules and Packages / 04 - Pip and Packages.py
# ============================================================

# ------------------------------------------------------------
# WHAT IS PIP?
# ------------------------------------------------------------
# pip = Python package manager
#
# It allows you to:
# - install libraries
# - manage dependencies
# ------------------------------------------------------------


# ------------------------------------------------------------
# HOW TO INSTALL PACKAGE
# ------------------------------------------------------------
# Run in terminal (NOT in Python file):
#
# pip install requests
#
# or
# python -m pip install requests
# ------------------------------------------------------------


# ------------------------------------------------------------
# USING INSTALLED PACKAGE
# ------------------------------------------------------------

import requests

response = requests.get("https://api.github.com")

print("Status code:", response.status_code)


# ------------------------------------------------------------
# INSTALL SPECIFIC VERSION
# ------------------------------------------------------------
# pip install requests==2.31.0


# ------------------------------------------------------------
# UNINSTALL PACKAGE
# ------------------------------------------------------------
# pip uninstall requests


# ------------------------------------------------------------
# LIST INSTALLED PACKAGES
# ------------------------------------------------------------
# pip list


# ------------------------------------------------------------
# SAVE DEPENDENCIES
# ------------------------------------------------------------
# pip freeze > requirements.txt


# ------------------------------------------------------------
# INSTALL FROM FILE
# ------------------------------------------------------------
# pip install -r requirements.txt
# -r = read from file

# ------------------------------------------------------------
# PRACTICAL EXAMPLE
# ------------------------------------------------------------
# Fetch data from API

import requests

response = requests.get("https://jsonplaceholder.typicode.com/users")

data = response.json()

for user in data:
    print(user["name"])


# ------------------------------------------------------------
# COMMON BEGINNER MISTAKES
# ------------------------------------------------------------

# ❌ Running pip inside Python file

# ❌ Not activating correct Python environment

# ❌ Import error after install (wrong interpreter)


# ------------------------------------------------------------
# DEBUG TIP
# ------------------------------------------------------------

print("DEBUG: requests module working")


# ------------------------------------------------------------
# MINI PRACTICE
# ------------------------------------------------------------
# Try this:
#
# pip install requests
#
# Then:
#
# import requests
# response = requests.get("https://api.github.com")
# print(response.status_code)


# ------------------------------------------------------------
# END OF FILE
# ------------------------------------------------------------
# You now understand pip and packages 🎯🔥
# This unlocks the entire Python ecosystem
# ------------------------------------------------------------