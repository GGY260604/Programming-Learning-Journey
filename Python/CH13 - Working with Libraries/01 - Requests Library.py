# ============================================================
# FILE: CH13 - Working with Libraries / 01 - Requests Library.py
# ============================================================

# ------------------------------------------------------------
# WHAT IS REQUESTS LIBRARY?
# ------------------------------------------------------------
# requests is used to:
# - send HTTP requests
# - interact with APIs
# - fetch data from websites
#
# Installation (run in terminal):
# pip install requests
# ------------------------------------------------------------


# ------------------------------------------------------------
# IMPORT REQUESTS
# ------------------------------------------------------------

import requests


# ------------------------------------------------------------
# BASIC GET REQUEST
# ------------------------------------------------------------

response = requests.get("https://api.github.com")

print("Status Code:", response.status_code)
print("Response Text:", response.text[:100])  # show first 100 chars


# ------------------------------------------------------------
# WORKING WITH JSON RESPONSE
# ------------------------------------------------------------

data = response.json()   # convert response to dictionary

print("Current user URL:", data.get("current_user_url"))


# ------------------------------------------------------------
# HANDLING ERRORS
# ------------------------------------------------------------

try:
    response = requests.get("https://invalid-url")
    response.raise_for_status()
except requests.exceptions.RequestException as e:
    print("Request failed:", e)


# ------------------------------------------------------------
# ADDING PARAMETERS
# ------------------------------------------------------------

params = {"q": "python"}

response = requests.get("https://api.github.com/search/repositories", params=params)

data = response.json()

print("Search result count:", data.get("total_count"))


# ------------------------------------------------------------
# HEADERS (ADVANCED)
# ------------------------------------------------------------

headers = {"User-Agent": "my-app"}

response = requests.get("https://api.github.com", headers=headers)

print("Headers sent successfully")


# ------------------------------------------------------------
# PRACTICAL EXAMPLE
# ------------------------------------------------------------
# Fetch users from fake API

response = requests.get("https://jsonplaceholder.typicode.com/users")

users = response.json()

for user in users:
    print(user["name"], "-", user["email"])


# ------------------------------------------------------------
# COMMON BEGINNER MISTAKES
# ------------------------------------------------------------

# ❌ Forget to install requests

# ❌ Not checking status_code

# ❌ Assuming response is always JSON


# ------------------------------------------------------------
# DEBUG TIP
# ------------------------------------------------------------

print("DEBUG status:", response.status_code)


# ------------------------------------------------------------
# MINI PRACTICE
# ------------------------------------------------------------
# Try this:
#
# response = requests.get("https://api.github.com")
# print(response.status_code)
# print(response.json())


# ------------------------------------------------------------
# END OF FILE
# ------------------------------------------------------------
# You now understand requests library 🎯🔥
# This is used for APIs and web data fetching
# ------------------------------------------------------------