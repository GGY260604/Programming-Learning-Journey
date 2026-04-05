#include <iostream>
using namespace std;

class Complex {
private:
    double real;
    double imag;

public:
    // Constructor
    Complex(double r = 0.0, double i = 0.0) { 
        real = r; 
        imag = i; 
    }

    // Getter methods for encapsulation
    double getReal() { return real; }
    double getImag() { return imag; }

    // Setter methods for encapsulation
    void setReal(double r) { real = r; }
    void setImag(double i) { imag = i; }

    // Overload + operator
    Complex operator+(const Complex& c) {
        return Complex(real + c.real, imag + c.imag);
    }

    // Overload == operator
    bool operator==(const Complex& c) {
        return (real == c.real && imag == c.imag);
    }

    // Overload << operator (friend function for I/O)
    friend ostream& operator<<(ostream& os, const Complex& c) {
        os << c.real << " + " << c.imag << "i";
        return os;
    }

    // Overload >> operator (friend function for I/O)
    friend istream& operator>>(istream& is, Complex& c) {
        cout << "Enter real part: ";
        is >> c.real;
        cout << "Enter imaginary part: ";
        is >> c.imag;
        return is;
    }
};

int main() {
    Complex c1(2.0, 3.0);
    Complex c2(1.5, 2.5);

    cout << "c1: " << c1 << endl;
    cout << "c2: " << c2 << endl;

    Complex c3 = c1 + c2;
    cout << "c1 + c2: " << c3 << endl;

    if (c1 == c2)
        cout << "c1 and c2 are equal" << endl;
    else
        cout << "c1 and c2 are not equal" << endl;

    Complex c4;
    cin >> c4;          // Use overloaded >> operator
    cout << "You entered: " << c4 << endl;

    return 0;
}

/*
Important Notes:
- Operator Overloading allows custom behavior for operators
- Encapsulation:
    - Private data members remain protected
    - Overloaded operators access private members through class methods or friend functions
- Always maintain professional practices:
    - Keep overloaded operators intuitive
    - Prefer member function for unary/binary operators that modify this object
    - Prefer friend function for << and >> operators
- Avoid overloading operators that might confuse users (e.g., &&, ||)
*/
