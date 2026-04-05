/*
------------------------------------------------------------
                    FOR LOOP FLOW
------------------------------------------------------------
Syntax:
    for (initialization; condition; update) {
        // loop body
    }

Order of execution:
1. Initialization  -> runs once, before the loop starts.
2. Condition check -> if true, execute body; if false, exit loop.
3. Loop body       -> executes if condition is true.
4. Update          -> executes after the body, before next condition check.
5. Repeat steps 2–4 until condition becomes false.

In simple words:
    INITIALIZATION -> CONDITION -> BODY -> UPDATE -> CONDITION -> BODY -> UPDATE -> ...
------------------------------------------------------------
*/

#include <iostream>
using namespace std;

int main() {
    cout << "For loop flow demonstration:" << endl;

    for (int i = 1; i <= 3; i++) {
        cout << "Inside loop body, i = " << i << endl;
    }

    /*
    Expected Output:
    Inside loop body, i = 1
    Inside loop body, i = 2
    Inside loop body, i = 3

    Step-by-step:
    1. initialization: int i = 1;
    2. condition: i <= 3 -> true
    3. body executes -> print i = 1
    4. update: i++ -> i = 2
    5. condition: i <= 3 -> true
    6. body executes -> print i = 2
    7. update: i++ -> i = 3
    8. condition: i <= 3 -> true
    9. body executes -> print i = 3
    10. update: i++ -> i = 4
    11. condition: i <= 3 -> false -> exit loop
    */

    cout << endl;

    // ------------------------------------------------------------
    // Demonstrate order clearly by printing each stage
    // ------------------------------------------------------------
    int j;
    for (j = 1; j <= 3; j++) {
        cout << "[BODY] j = " << j << endl;
        if (j == 1) cout << "  -> Body executes after condition passes" << endl;
    }
    cout << "[AFTER LOOP] j = " << j << " (loop stopped because condition is false)" << endl;

    cout << endl;

    // ------------------------------------------------------------
    // Expanded view with manual explanation
    // ------------------------------------------------------------
    cout << "Detailed tracing of a for loop:" << endl;

    int k = 1;                      // initialization (runs once)
    while (k <= 3) {                // condition check
        cout << "  BODY executes, k = " << k << endl;  // body
        k++;                        // update (executed after body)
    }

    /*
    The above while loop is equivalent to:
        for (int k = 1; k <= 3; k++) {
            cout << "  BODY executes, k = " << k << endl;
        }
    */

    return 0;
}

/*
------------------------------------------------------------
SUMMARY:
- Initialization runs only once, at the start.
- Each iteration does this order:
    1. Check condition.
    2. Execute body (if condition true).
    3. Execute update statement.
- The update runs AFTER the body, before the next condition check.
- When the condition becomes false, loop terminates immediately
  and the program continues with the next statement after the loop.
------------------------------------------------------------
*/
