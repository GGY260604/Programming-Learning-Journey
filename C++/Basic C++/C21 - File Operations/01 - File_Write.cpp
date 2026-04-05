#include <iostream>
#include <fstream>
using namespace std;

int main() {
    // Create and open a file for writing
    // If the file already exists, its content will be deleted (truncated)
    ofstream fout("data.txt");

    // Always check if the file opened successfully
    if (!fout) {
        cerr << "Error opening file for writing" << endl;
        return 1;
    }

    // Write some lines into the file
    fout << "Name: Galen" << endl;
    fout << "Age: 21" << endl;
    fout << "Country: Malaysia" << endl;

    // Always close the file after finishing writing
    fout.close();
    cout << "Data written to file successfully" << endl;

    return 0;
}

/*
Important Notes:
- ofstream = Output File Stream used for writing to files
- Opening mode by default: ios::out | ios::trunc
  => overwrites the file if it already exists
- Always close() after done to ensure data is saved
*/
