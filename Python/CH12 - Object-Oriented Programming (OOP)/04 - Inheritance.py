# ============================================================
# FILE: CH12 - Object-Oriented Programming (OOP) / 04 - Inheritance.py
# ============================================================

# ------------------------------------------------------------
# WHAT IS INHERITANCE?
# ------------------------------------------------------------
# Inheritance allows a class to inherit properties
# and methods from another class
#
# Parent class → base class
# Child class  → derived class
# ------------------------------------------------------------


# ------------------------------------------------------------
# BASIC INHERITANCE
# ------------------------------------------------------------

class Animal:
    def speak(self):
        print("Animal makes a sound")


class Dog(Animal):   # Dog inherits Animal
    pass


dog = Dog()
dog.speak()   # inherited method


# ------------------------------------------------------------
# ADD CHILD CLASS METHOD
# ------------------------------------------------------------

class Dog(Animal):
    def bark(self):
        print("Dog barks")


dog = Dog()
dog.speak()
dog.bark()


# ------------------------------------------------------------
# OVERRIDE METHOD (IMPORTANT)
# ------------------------------------------------------------

class Animal:
    def speak(self):
        print("Animal sound")


class Dog(Animal):
    def speak(self):
        print("Dog barks")

dog = Dog()
dog.speak()   # overridden method


# ------------------------------------------------------------
# USING SUPER()
# ------------------------------------------------------------

class Animal:
    def __init__(self, name):
        self.name = name


class Dog(Animal):
    def __init__(self, name, breed):
        super().__init__(name)   # call parent constructor
        self.breed = breed

dog = Dog("Buddy", "Labrador")

print(dog.name)
print(dog.breed)


# ------------------------------------------------------------
# MULTIPLE INHERITANCE
# ------------------------------------------------------------

class A:
    def method_a(self):
        print("A method")


class B:
    def method_b(self):
        print("B method")


class C(A, B):
    pass


c = C()
c.method_a()
c.method_b()


# ------------------------------------------------------------
# REAL EXAMPLE
# ------------------------------------------------------------

class Vehicle:
    def move(self):
        print("Vehicle moving")


class Car(Vehicle):
    def move(self):
        print("Car driving")


class Bike(Vehicle):
    def move(self):
        print("Bike riding")


v1 = Car()
v2 = Bike()

v1.move()
v2.move()


# ------------------------------------------------------------
# COMMON BEGINNER MISTAKES
# ------------------------------------------------------------

# ❌ Forget to call parent constructor

# ❌ Confusing override vs new method

# ❌ Overusing inheritance unnecessarily


# ------------------------------------------------------------
# DEBUG TIP
# ------------------------------------------------------------

print("DEBUG class:", Dog.__mro__)   # method resolution order


# ------------------------------------------------------------
# MINI PRACTICE
# ------------------------------------------------------------
# Try this:

# class Person:
#     def __init__(self, name):
#         self.name = name
#
# class Student(Person):
#     def study(self):
#         print(self.name, "is studying")
#
# s = Student("Ali")
# s.study()


# ------------------------------------------------------------
# END OF FILE
# ------------------------------------------------------------
# You now understand inheritance 🎯🔥
# This is key for code reuse and system design
# ------------------------------------------------------------