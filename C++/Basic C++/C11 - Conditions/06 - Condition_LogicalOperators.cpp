/*
-------------------------------------
     CONDITIONS WITH LOGICAL OPERATORS
-------------------------------------
Logical operators are used to combine 
multiple conditions in an if statement.

   &&  -> AND
   ||  -> OR
   !   -> NOT
*/

#include <iostream>
using namespace std;

int main() {
    int age = 25;
    bool hasLicense = true;
    bool isDrunk = false;

    // Using AND (&&)
    if (age >= 18 && hasLicense) {
        cout << "You can drive." << endl;
    }

    // Using OR (||)
    if (age < 18 || !hasLicense) {
        cout << "You cannot drive yet." << endl;
    } else {
        cout << "You meet the driving requirements." << endl;
    }

    // Combining multiple logical operators
    if (age >= 18 && hasLicense && !isDrunk) {
        cout << "You are allowed to drive safely." << endl;
    } else {
        cout << "Driving not allowed!" << endl;
    }

    /*
    -------------------------------------
               EXPLANATION
    -------------------------------------
    (age >= 18 && hasLicense)
        -> true only if both conditions are true
    (age < 18 || !hasLicense)
        -> true if either condition is true
    !isDrunk
        -> true if isDrunk is false

    -------------------------------------
                EXAMPLE
    -------------------------------------
    Let’s check multiple combined conditions.
    */

    int score = 75;
    int attendance = 80;

    if ((score >= 70 && attendance >= 75) || score == 100) {
        cout << "You passed the course." << endl;
    } else {
        cout << "You failed the course." << endl;
    }

    /*
    -------------------------------------
                NOTES
    -------------------------------------
    - Parentheses () are used to group expressions clearly.
    - The order of evaluation follows operator precedence:
         1. !   (NOT)
         2. &&  (AND)
         3. ||  (OR)
    - Use parentheses when combining multiple conditions 
      to make code easier to read and avoid mistakes.
    */
    return 0;
}
