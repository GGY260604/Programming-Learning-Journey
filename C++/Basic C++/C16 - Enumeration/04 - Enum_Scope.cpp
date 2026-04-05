#include <iostream>
using namespace std;

// In modern C++ (C++11 and above), we can use "enum class"
// to prevent naming conflicts and make the type more type-safe.

enum class TrafficLight { RED, YELLOW, GREEN };

int main() {
    TrafficLight light = TrafficLight::YELLOW;

    // You must use the scope resolution (::) to access members
    if (light == TrafficLight::YELLOW)
        cout << "Prepare to stop." << endl;

    // Convert enum class value to integer for display
    cout << "Numeric value of YELLOW is: " << static_cast<int>(TrafficLight::YELLOW) << endl;

    // Note:
    // - "enum class" values do not implicitly convert to int
    // - Helps avoid conflicts with variables of the same name
}
