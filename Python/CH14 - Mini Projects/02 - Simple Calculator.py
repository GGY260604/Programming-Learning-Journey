# ============================================================
# FILE: CH14 - Mini Projects / 02 - Simple Calculator.py
# ============================================================

# ------------------------------------------------------------
# PROJECT: SIMPLE CALCULATOR
# ------------------------------------------------------------
# This program:
# - performs basic operations (+, -, *, /)
# - uses functions
# - handles user input
# - runs continuously until exit
# ------------------------------------------------------------


# ------------------------------------------------------------
# FUNCTIONS FOR OPERATIONS
# ------------------------------------------------------------

def add(a, b):
    return a + b

def subtract(a, b):
    return a - b

def multiply(a, b):
    return a * b

def divide(a, b):
    if b == 0:
        return "Error: Division by zero"
    return a / b


# ------------------------------------------------------------
# MAIN LOOP
# ------------------------------------------------------------

while True:
    print("\n--- SIMPLE CALCULATOR ---")
    print("1. Add")
    print("2. Subtract")
    print("3. Multiply")
    print("4. Divide")
    print("5. Exit")

    choice = input("Choose option (1-5): ")

    if choice == "5":
        print("Goodbye!")
        break

    try:
        num1 = float(input("Enter first number: "))
        num2 = float(input("Enter second number: "))
    except ValueError:
        print("Invalid input! Please enter numbers.")
        continue


# ------------------------------------------------------------
# OPERATION LOGIC
# ------------------------------------------------------------

    if choice == "1":
        result = add(num1, num2)

    elif choice == "2":
        result = subtract(num1, num2)

    elif choice == "3":
        result = multiply(num1, num2)

    elif choice == "4":
        result = divide(num1, num2)

    else:
        print("Invalid choice!")
        continue


# ------------------------------------------------------------
# DISPLAY RESULT
# ------------------------------------------------------------

    print(f"Result: {result}")


# ------------------------------------------------------------
# OPTIONAL IMPROVEMENTS
# ------------------------------------------------------------
# - add power (^)
# - add percentage
# - support multiple operations in one line
# ------------------------------------------------------------


# ------------------------------------------------------------
# DEBUG TIP
# ------------------------------------------------------------

print("DEBUG: Calculator program ended")


# ------------------------------------------------------------
# MINI CHALLENGE
# ------------------------------------------------------------
# Try:
# - Add square root
# - Add history (save results to file)
# - Add GUI later (advanced)
# ------------------------------------------------------------


# ------------------------------------------------------------
# END OF FILE
# ------------------------------------------------------------
# You built a functional calculator 🎯🔥
# This is real application logic
# ------------------------------------------------------------