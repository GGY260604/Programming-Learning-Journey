#include <iostream>
using namespace std;

// Base class
class Shape {
public:
    // Virtual function for runtime polymorphism
    virtual void draw() {
        cout << "Drawing a generic shape" << endl;
    }

    virtual double area() {
        return 0.0;
    }

    virtual ~Shape() {} // Virtual destructor
};

// Derived class 1
class Circle : public Shape {
private:
    double radius;

public:
    Circle(double r) { radius = r; }

    void draw() override {  // Override base method
        cout << "Drawing a Circle" << endl;
    }

    double area() override {
        return 3.14159 * radius * radius;
    }
};

// Derived class 2
class Rectangle : public Shape {
private:
    double width, height;

public:
    Rectangle(double w, double h) {
        width = w;
        height = h;
    }

    void draw() override {
        cout << "Drawing a Rectangle" << endl;
    }

    double area() override {
        return width * height;
    }
};

int main() {
    Shape* shapes[2];

    shapes[0] = new Circle(5.0);
    shapes[1] = new Rectangle(4.0, 6.0);

    for (int i = 0; i < 2; i++) {
        shapes[i]->draw();         // Calls derived class method at runtime
        cout << "Area: " << shapes[i]->area() << endl;
    }

    // Free memory
    for (int i = 0; i < 2; i++) delete shapes[i];

    return 0;
}

/*
Important Notes:
- Virtual functions enable runtime polymorphism
- Base class pointer or reference can call derived class methods
- Override keyword ensures correct overriding
- Virtual destructor ensures proper cleanup of derived objects
- Encapsulation: private members of derived classes are still protected
*/
