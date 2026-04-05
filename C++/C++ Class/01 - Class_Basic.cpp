#include <iostream>
using namespace std;

// A simple class definition
class Car {
public: // Access specifier
    string brand;
    string model;
    int year;

    // Method (member function)
    void displayInfo() {
        cout << "Brand: " << brand << endl;
        cout << "Model: " << model << endl;
        cout << "Year: " << year << endl;
    }
};

int main() {
    // Create an object of Car
    Car car1;

    // Access members using dot operator
    car1.brand = "Toyota";
    car1.model = "Vios";
    car1.year = 2020;

    // Call method
    car1.displayInfo();

    return 0;
}

/*
Important Notes:
- A class is a user-defined data type that groups variables (attributes) and functions (methods)
- Syntax:
    class ClassName {
        public:
            // attributes
            // methods
    };
- Access specifiers:
    public    => accessible from anywhere
    private   => accessible only inside the class
    protected => accessible inside the class and subclasses
- Objects are created from classes
- Dot operator (.) is used to access attributes and methods
*/
