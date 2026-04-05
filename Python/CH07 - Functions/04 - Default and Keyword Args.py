# ============================================================
# FILE: CH07 - Functions / 04 - Default and Keyword Args.py
# ============================================================

# ------------------------------------------------------------
# DEFAULT ARGUMENTS
# ------------------------------------------------------------
# You can set default values for parameters
#
# If no argument is given → default is used
# ------------------------------------------------------------

def greet(name="Guest"):
    print(f"Hello {name}")

greet("Galen")   # Hello Galen
greet()          # Hello Guest


# ------------------------------------------------------------
# MULTIPLE DEFAULT PARAMETERS
# ------------------------------------------------------------

def create_user(name="Unknown", age=0):
    print(f"Name: {name}, Age: {age}")

create_user("Ali", 25)
create_user("Ali")
create_user()


# ------------------------------------------------------------
# RULE: DEFAULT PARAMETERS POSITION
# ------------------------------------------------------------
# Default parameters must be AFTER normal parameters

# ❌ WRONG:
# def test(a=1, b):
#     pass

# ✅ CORRECT:
def test(a, b=1):
    print(a, b)


# ------------------------------------------------------------
# KEYWORD ARGUMENTS
# ------------------------------------------------------------
# You can specify arguments by name

def introduce(name, age):
    print(f"{name} is {age} years old")

introduce(age=21, name="Galen")   # order doesn't matter


# ------------------------------------------------------------
# MIXING POSITIONAL AND KEYWORD
# ------------------------------------------------------------

def display(name, age):
    print(name, age)

display("Ali", age=20)   # valid


# ------------------------------------------------------------
# USING DEFAULT + KEYWORD
# ------------------------------------------------------------

def login(username, password="1234"):
    print(f"Username: {username}, Password: {password}")

login("admin")
login("admin", password="abcd")


# ------------------------------------------------------------
# PRACTICAL EXAMPLE
# ------------------------------------------------------------

def order(item, quantity=1, price=10):
    total = quantity * price
    print(f"Item: {item}, Quantity: {quantity}, Total: {total}")

order("Apple")
order("Apple", 5)
order("Apple", quantity=3, price=8)


# ------------------------------------------------------------
# COMMON BEGINNER MISTAKES
# ------------------------------------------------------------

# ❌ Wrong parameter order

# ❌ Forget parameter name in keyword argument

# ❌ Mixing positional after keyword (invalid)


# ------------------------------------------------------------
# DEBUG TIP
# ------------------------------------------------------------

def debug_func(a=0, b=0):
    print(f"DEBUG a={a}, b={b}")

debug_func()
debug_func(5)
debug_func(b=10)


# ------------------------------------------------------------
# MINI PRACTICE
# ------------------------------------------------------------
# Try this:

# def register(name, role="user"):
#     print(f"{name} registered as {role}")
#
# register("Ali")
# register("Ali", "admin")


# ------------------------------------------------------------
# END OF FILE
# ------------------------------------------------------------
# You now understand default & keyword arguments 🎯
# This makes your functions flexible and powerful 🔥
# ------------------------------------------------------------