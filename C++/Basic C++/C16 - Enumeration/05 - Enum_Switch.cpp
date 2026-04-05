#include <iostream>
using namespace std;

// Define an enumeration for traffic light states
enum TrafficLight {
    RED,
    YELLOW,
    GREEN
};

int main() {
    TrafficLight light = YELLOW;

    // Switch statement works perfectly with enum values
    switch (light) {
        case RED:
            cout << "Stop! The light is RED." << endl;
            break;

        case YELLOW:
            cout << "Caution! The light is YELLOW." << endl;
            break;

        case GREEN:
            cout << "Go! The light is GREEN." << endl;
            break;

        default:
            cout << "Invalid light state!" << endl;
            break;
    }

    // Note:
    // - Enum values are internally integers, so switch can use them directly
    // - Each case should match an enum constant
    // - Always include 'break' to prevent fall-through (unintentional next case execution)
    // - The default case handles unexpected values (good practice)
}
