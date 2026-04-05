#include <iostream>
using namespace std;

class Math {
public:
    int add(int x, int y);  // function declaration
};

// Function definition outside class using scope resolution operator ::
int Math::add(int x, int y) {
    return x + y;
}

int main() {
    Math m;
    cout << "Sum: " << m.add(3, 5) << endl;
    return 0;
}

/*
Important Notes:
- The scope resolution operator (::) is used to define class functions outside the class body
- This improves code readability and separation between declaration and definition
*/
