# ============================================================
# FILE: CH12 - Object-Oriented Programming (OOP) / 03 - Encapsulation.py
# ============================================================

# ------------------------------------------------------------
# WHAT IS ENCAPSULATION?
# ------------------------------------------------------------
# Encapsulation = hiding internal data and controlling access
#
# Why?
# - protect data
# - prevent invalid changes
# - control how data is used
# ------------------------------------------------------------


# ------------------------------------------------------------
# PUBLIC ATTRIBUTE (DEFAULT)
# ------------------------------------------------------------

class Person:
    def __init__(self, name):
        self.name = name   # public

p1 = Person("Galen")
print(p1.name)

# Can change directly
p1.name = "Ali"
print(p1.name)


# ------------------------------------------------------------
# PRIVATE ATTRIBUTE (_ or __)
# ------------------------------------------------------------

class Person:
    def __init__(self, name):
        self.__name = name   # private (name mangling)

p1 = Person("Galen")

# ❌ This will cause error:
# print(p1.__name)


# ------------------------------------------------------------
# ACCESS USING METHOD (GETTER)
# ------------------------------------------------------------

class Person:
    def __init__(self, name):
        self.__name = name

    def get_name(self):
        return self.__name

p1 = Person("Galen")
print(p1.get_name())


# ------------------------------------------------------------
# MODIFY USING METHOD (SETTER)
# ------------------------------------------------------------

class Person:
    def __init__(self, name):
        self.__name = name

    def set_name(self, new_name):
        if len(new_name) > 0:
            self.__name = new_name
        else:
            print("Invalid name")

    def get_name(self):
        return self.__name

p1 = Person("Galen")

p1.set_name("Ali")
print(p1.get_name())


# ------------------------------------------------------------
# REAL EXAMPLE
# ------------------------------------------------------------

class BankAccount:
    def __init__(self, balance):
        self.__balance = balance

    def deposit(self, amount):
        if amount > 0:
            self.__balance += amount

    def withdraw(self, amount):
        if amount <= self.__balance:
            self.__balance -= amount
        else:
            print("Insufficient funds")

    def get_balance(self):
        return self.__balance

acc = BankAccount(100)

acc.deposit(50)
acc.withdraw(30)

print("Balance:", acc.get_balance())


# ------------------------------------------------------------
# PROTECTED ATTRIBUTE (_)
# ------------------------------------------------------------
# Convention: use _ (not strictly private)

class Test:
    def __init__(self):
        self._value = 10


# ------------------------------------------------------------
# COMMON BEGINNER MISTAKES
# ------------------------------------------------------------

# ❌ Trying to access private attribute directly

# ❌ Not using getter/setter

# ❌ Overcomplicating simple classes


# ------------------------------------------------------------
# DEBUG TIP
# ------------------------------------------------------------

print("DEBUG:", acc.__dict__)


# ------------------------------------------------------------
# MINI PRACTICE
# ------------------------------------------------------------
# Try this:

# class Student:
#     def __init__(self, score):
#         self.__score = score
#
#     def get_score(self):
#         return self.__score
#
# s = Student(80)
# print(s.get_score())


# ------------------------------------------------------------
# END OF FILE
# ------------------------------------------------------------
# You now understand encapsulation 🎯🔥
# This protects and controls your data
# ------------------------------------------------------------