#include <iostream>
using namespace std;

class Box {
private:
    double length;
    double width;
    double height;

public:
    // Constructor
    Box(double l, double w, double h) {
        length = l;
        width = w;
        height = h;
    }

    // Display function
    void displayDimensions() {
        cout << "Length: " << length
             << ", Width: " << width
             << ", Height: " << height << endl;
    }

    // Friend function declaration
    friend double calculateVolume(const Box& b);
};

// Friend function definition
double calculateVolume(const Box& b) {
    // Can access private members of Box
    return b.length * b.width * b.height;
}

int main() {
    Box box1(2.5, 3.0, 4.0);

    box1.displayDimensions();

    // Access private members via friend function
    cout << "Volume of box: " << calculateVolume(box1) << endl;

    return 0;
}

/*
Important Notes:
- Friend Function:
    - Not a member of the class
    - Can access private and protected members
    - Declared inside class with keyword 'friend'
- Friend functions are useful when:
    - External functions need access to private members
    - But class encapsulation is still maintained (controlled access)
- Overuse of friend functions can reduce encapsulation
*/
