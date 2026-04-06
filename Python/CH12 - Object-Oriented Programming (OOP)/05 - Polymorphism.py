# ============================================================
# FILE: CH12 - Object-Oriented Programming (OOP) / 05 - Polymorphism.py
# ============================================================

# ------------------------------------------------------------
# WHAT IS POLYMORPHISM?
# ------------------------------------------------------------
# Polymorphism = "many forms"
#
# Same method name → different behavior
# depending on the object
# ------------------------------------------------------------


# ------------------------------------------------------------
# BASIC EXAMPLE
# ------------------------------------------------------------

class Dog:
    def speak(self):
        print("Dog barks")


class Cat:
    def speak(self):
        print("Cat meows")


def make_sound(animal):
    animal.speak()

d = Dog()
c = Cat()

make_sound(d)
make_sound(c)


# ------------------------------------------------------------
# POLYMORPHISM WITH INHERITANCE
# ------------------------------------------------------------

class Animal:
    def speak(self):
        print("Animal sound")


class Dog(Animal):
    def speak(self):
        print("Dog barks")


class Cat(Animal):
    def speak(self):
        print("Cat meows")


animals = [Dog(), Cat()]

for a in animals:
    a.speak()


# ------------------------------------------------------------
# BUILT-IN POLYMORPHISM
# ------------------------------------------------------------

print(len("Hello"))        # string length
print(len([1, 2, 3]))     # list length


# ------------------------------------------------------------
# REAL EXAMPLE
# ------------------------------------------------------------

class Payment:
    def pay(self):
        print("Processing payment")


class CreditCard(Payment):
    def pay(self):
        print("Paid with credit card")


class EWallet(Payment):
    def pay(self):
        print("Paid with e-wallet")


payments = [CreditCard(), EWallet()]

for p in payments:
    p.pay()


# ------------------------------------------------------------
# WHY POLYMORPHISM?
# ------------------------------------------------------------
# - flexible code
# - easy to extend
# - less conditional logic
# ------------------------------------------------------------


# ------------------------------------------------------------
# COMMON BEGINNER MISTAKES
# ------------------------------------------------------------

# ❌ Thinking classes must be related

# ❌ Forget method name must match

# ❌ Overcomplicating simple cases


# ------------------------------------------------------------
# DEBUG TIP
# ------------------------------------------------------------

print("DEBUG type:", type(d))


# ------------------------------------------------------------
# MINI PRACTICE
# ------------------------------------------------------------
# Try this:

# class Bird:
#     def fly(self):
#         print("Bird flies")
#
# class Plane:
#     def fly(self):
#         print("Plane flies")
#
# def test_fly(obj):
#     obj.fly()
#
# test_fly(Bird())
# test_fly(Plane())


# ------------------------------------------------------------
# END OF FILE
# ------------------------------------------------------------
# You now understand polymorphism 🎯🔥
# This makes your code flexible and scalable
# ------------------------------------------------------------