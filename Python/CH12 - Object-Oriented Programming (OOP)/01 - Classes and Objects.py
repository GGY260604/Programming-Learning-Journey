# ============================================================
# FILE: CH12 - Object-Oriented Programming (OOP) / 01 - Classes and Objects.py
# ============================================================

# ------------------------------------------------------------
# WHAT IS OOP?
# ------------------------------------------------------------
# OOP = Object-Oriented Programming
#
# It helps you organize code using:
# - classes (blueprints)
# - objects (instances)
# ------------------------------------------------------------


# ------------------------------------------------------------
# WHAT IS A CLASS?
# ------------------------------------------------------------
# A class is a blueprint for creating objects
# ------------------------------------------------------------

class Person:
    pass


# ------------------------------------------------------------
# CREATE OBJECT (INSTANCE)
# ------------------------------------------------------------

p1 = Person()
print(p1)
# <__main__.Person object at 0x000001D6584986E0> 
# This is an object of type Person

# ------------------------------------------------------------
# ADD ATTRIBUTES
# ------------------------------------------------------------

class Person:
    def __init__(self, name, age):
        self.name = name   # attribute
        self.age = age

p1 = Person("Galen", 21)

print(p1.name)
print(p1.age)


# ------------------------------------------------------------
# ADD METHODS (FUNCTIONS INSIDE CLASS)
# ------------------------------------------------------------

class Person:
    def __init__(self, name, age):
        self.name = name
        self.age = age

    def greet(self):
        print(f"Hello, my name is {self.name}")

p1 = Person("Galen", 21)
p1.greet()


# ------------------------------------------------------------
# MULTIPLE OBJECTS
# ------------------------------------------------------------

p2 = Person("Ali", 25)

p1.greet()
p2.greet()


# ------------------------------------------------------------
# MODIFY ATTRIBUTES
# ------------------------------------------------------------

p1.age = 22
print(p1.age)


# ------------------------------------------------------------
# DELETE ATTRIBUTE / OBJECT
# ------------------------------------------------------------

# del p1.age
# del p1


# ------------------------------------------------------------
# COMMON BEGINNER MISTAKES
# ------------------------------------------------------------

# ❌ Forget self parameter

# ❌ Not using __init__ correctly

# ❌ Confusing class and object


# ------------------------------------------------------------
# DEBUG TIP
# ------------------------------------------------------------

print("DEBUG object:", p1.__dict__)


# ------------------------------------------------------------
# MINI PRACTICE
# ------------------------------------------------------------
# Try this:

# class Car:
#     def __init__(self, brand, price):
#         self.brand = brand
#         self.price = price
#
# car1 = Car("Toyota", 50000)
# print(car1.brand, car1.price)


# ------------------------------------------------------------
# END OF FILE
# ------------------------------------------------------------
# You now understand classes and objects 🎯🔥
# This is the foundation of OOP
# ------------------------------------------------------------