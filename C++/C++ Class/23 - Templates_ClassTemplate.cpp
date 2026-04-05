#include <iostream>
using namespace std;

// Class template for a simple container
template <typename T>
class Container {
private:
    T value;  // Encapsulated private member

public:
    // Constructor
    Container(T val) { value = val; }

    // Getter
    T getValue() { return value; }

    // Setter
    void setValue(T val) { value = val; }

    // Display
    void display() { cout << "Value: " << value << endl; }
};

int main() {
    Container<int> intBox(10);
    intBox.display();
    intBox.setValue(20);
    intBox.display();

    Container<string> strBox("Hello");
    strBox.display();
    strBox.setValue("World");
    strBox.display();

    return 0;
}

/*
Important Notes:
- Class templates allow writing generic classes for any data type
- Encapsulation is maintained: private members accessed via getter/setter
- Constructor and methods are type-safe for the template type T
- Professional practice: use templates for reusable, type-agnostic components
*/
