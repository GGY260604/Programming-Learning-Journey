#include <iostream>
using namespace std;

class Base {
public:
    Base() { cout << "Base constructor called" << endl; }
};

class Derived : public Base {
public:
    Derived() { cout << "Derived constructor called" << endl; }
};

int main() {
    Derived d;
    return 0;
}

/*
Important Notes:
- Base class constructor is always called first, then derived class constructor
- Same applies for destructors but in reverse order: derived destructor first, then base destructor
- Proper constructor order ensures base class initialization is done before derived class adds functionality
*/
