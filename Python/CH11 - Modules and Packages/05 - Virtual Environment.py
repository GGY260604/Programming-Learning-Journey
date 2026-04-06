# ============================================================
# FILE: CH11 - Modules and Packages / 05 - Virtual Environment.py
# ============================================================

# ------------------------------------------------------------
# WHAT IS A VIRTUAL ENVIRONMENT?
# ------------------------------------------------------------
# A virtual environment is an isolated Python environment
#
# It allows you to:
# - install packages without affecting global Python
# - manage project-specific dependencies
# ------------------------------------------------------------


# ------------------------------------------------------------
# WHY USE VIRTUAL ENV?
# ------------------------------------------------------------
# Example:
# Project A → needs requests v2.28
# Project B → needs requests v2.31
#
# Virtual env keeps them separate
# ------------------------------------------------------------


# ------------------------------------------------------------
# CREATE VIRTUAL ENV
# ------------------------------------------------------------
# Run in terminal:
#
# python -m venv venvname
#
# -m = module
# venv = virtual environment module 
# This creates a folder named "venvname" with the environment
# ------------------------------------------------------------


# ------------------------------------------------------------
# ACTIVATE VIRTUAL ENV (WINDOWS)
# ------------------------------------------------------------
# In PowerShell:
#
# venvname\Scripts\Activate
#
# You should see (venvname) in terminal
# ------------------------------------------------------------


# ------------------------------------------------------------
# ACTIVATE (MAC / LINUX)
# ------------------------------------------------------------
# source venvname/bin/activate


# ------------------------------------------------------------
# INSTALL PACKAGES INSIDE ENV
# ------------------------------------------------------------
# pip install requests


# ------------------------------------------------------------
# DEACTIVATE ENV
# ------------------------------------------------------------
# deactivate


# ------------------------------------------------------------
# CHECK CURRENT ENV
# ------------------------------------------------------------

import sys

print("Python path:", sys.executable)


# ------------------------------------------------------------
# REQUIREMENTS FILE
# ------------------------------------------------------------
# Save installed packages:
#
# pip freeze > requirements.txt
#
# > means "write to file"
# ------------------------------------------------------------
# Install later:
#
# pip install -r requirements.txt
# ------------------------------------------------------------


# ------------------------------------------------------------
# PRACTICAL WORKFLOW
# ------------------------------------------------------------
# 1. Create project folder
# 2. Create venv
# 3. Activate venv
# 4. Install packages
# 5. Work on project
# 6. Save requirements.txt
# ------------------------------------------------------------


# ------------------------------------------------------------
# COMMON BEGINNER MISTAKES
# ------------------------------------------------------------

# ❌ Forget to activate venv

# ❌ Installing globally instead of venv

# ❌ Not including requirements.txt


# ------------------------------------------------------------
# DEBUG TIP
# ------------------------------------------------------------

print("DEBUG: Virtual environment check complete")


# ------------------------------------------------------------
# MINI PRACTICE
# ------------------------------------------------------------
# Try this:
#
# 1. Create venv
# 2. Activate it
# 3. Install requests
# 4. Run a simple API call


# ------------------------------------------------------------
# END OF FILE
# ------------------------------------------------------------
# You now understand virtual environments 🎯🔥
# This is ESSENTIAL for real-world development
# ------------------------------------------------------------