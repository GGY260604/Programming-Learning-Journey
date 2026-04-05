#include <iostream>
using namespace std;

// Abstract class with pure virtual function
class Animal {
public:
    virtual void makeSound() = 0; // Pure virtual function

    virtual ~Animal() {} // Virtual destructor
};

// Derived class 1
class Dog : public Animal {
private:
    string name;

public:
    Dog(string n) { name = n; }

    void makeSound() override {
        cout << name << " says Woof!" << endl;
    }
};

// Derived class 2
class Cat : public Animal {
private:
    string name;

public:
    Cat(string n) { name = n; }

    void makeSound() override {
        cout << name << " says Meow!" << endl;
    }
};

int main() {
    Animal* pets[2];

    pets[0] = new Dog("Rex");
    pets[1] = new Cat("Whiskers");

    for (int i = 0; i < 2; i++)
        pets[i]->makeSound(); // Calls appropriate derived class method

    for (int i = 0; i < 2; i++)
        delete pets[i];

    return 0;
}

/*
Important Notes:
- Abstract class cannot be instantiated
- Pure virtual functions force derived classes to implement them
- Supports polymorphism for heterogeneous collections
- Virtual destructor ensures proper cleanup
- Encapsulation: derived class private members are still protected
- Professional practice: use abstract classes to define interfaces
*/
