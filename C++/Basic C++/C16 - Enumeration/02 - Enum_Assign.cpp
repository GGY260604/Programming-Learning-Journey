#include <iostream>
using namespace std;

enum Day { MON, TUE, WED, THU, FRI, SAT, SUN };

int main() {
    Day today = FRI;

    // Compare enum values
    if (today == FRI)
        cout << "It's Friday! Weekend is near!" << endl;

    // Assigning new enum value
    today = SUN;

    if (today == SUN)
        cout << "Relax, it's Sunday." << endl;

    // Display numeric value
    cout << "Numeric value of SUN is: " << today << endl;

    // Note:
    // - Enum constants are actually integers (starting from 0)
    // - You can compare or assign them just like integers
}
