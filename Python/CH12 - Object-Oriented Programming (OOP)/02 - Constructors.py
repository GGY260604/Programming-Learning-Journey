# ============================================================
# FILE: CH12 - Object-Oriented Programming (OOP) / 02 - Constructors.py
# ============================================================

# ------------------------------------------------------------
# WHAT IS A CONSTRUCTOR?
# ------------------------------------------------------------
# A constructor is a special method that runs
# when an object is created
#
# In Python: __init__()
# ------------------------------------------------------------


# ------------------------------------------------------------
# BASIC CONSTRUCTOR
# ------------------------------------------------------------

class Person:
    def __init__(self):
        print("Object created")

p1 = Person()


# ------------------------------------------------------------
# CONSTRUCTOR WITH PARAMETERS
# ------------------------------------------------------------

class Person:
    def __init__(self, name, age):
        self.name = name
        self.age = age

p1 = Person("Galen", 21)

print(p1.name)
print(p1.age)


# ------------------------------------------------------------
# DEFAULT VALUES IN CONSTRUCTOR
# ------------------------------------------------------------

class User:
    def __init__(self, username="Guest"):
        self.username = username

u1 = User()
u2 = User("admin")

print(u1.username)
print(u2.username)


# ------------------------------------------------------------
# MULTIPLE ATTRIBUTES
# ------------------------------------------------------------

class Car:
    def __init__(self, brand, price, color):
        self.brand = brand
        self.price = price
        self.color = color

car1 = Car("Toyota", 50000, "Red")

print(car1.brand, car1.price, car1.color)


# ------------------------------------------------------------
# MODIFY ATTRIBUTES AFTER CREATION
# ------------------------------------------------------------

car1.price = 45000
print(car1.price)


# ------------------------------------------------------------
# USING METHODS WITH CONSTRUCTOR
# ------------------------------------------------------------

class Student:
    def __init__(self, name, score):
        self.name = name
        self.score = score

    def display(self):
        print(f"{self.name} scored {self.score}")

s1 = Student("Ali", 80)
s1.display()


# ------------------------------------------------------------
# COMMON BEGINNER MISTAKES
# ------------------------------------------------------------

# ❌ Forget self

# ❌ Wrong parameter order

# ❌ Not passing required arguments


# ------------------------------------------------------------
# DEBUG TIP
# ------------------------------------------------------------

print("DEBUG attributes:", s1.__dict__)


# ------------------------------------------------------------
# MINI PRACTICE
# ------------------------------------------------------------
# Try this:

# class Book:
#     def __init__(self, title, author):
#         self.title = title
#         self.author = author
#
# b1 = Book("Python", "Galen")
# print(b1.title, b1.author)


# ------------------------------------------------------------
# END OF FILE
# ------------------------------------------------------------
# You now understand constructors 🎯🔥
# This is essential for creating structured objects
# ------------------------------------------------------------