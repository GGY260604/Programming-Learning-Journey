# ============================================================
# FILE: CH14 - Mini Projects / 03 - To-Do List (File-Based).py
# ============================================================

# ------------------------------------------------------------
# PROJECT: TO-DO LIST (FILE-BASED)
# ------------------------------------------------------------
# This program:
# - adds tasks
# - views tasks
# - deletes tasks
# - saves tasks in file
# ------------------------------------------------------------


# ------------------------------------------------------------
# FILE NAME
# ------------------------------------------------------------

FILE_NAME = "CH14 - Mini Projects/03 - To-Do List (File-Based).txt"


# ------------------------------------------------------------
# LOAD TASKS FROM FILE
# ------------------------------------------------------------

def load_tasks():
    try:
        with open(FILE_NAME, "r") as file:
            tasks = file.readlines()
            return [task.strip() for task in tasks]
    except FileNotFoundError:
        return []


# ------------------------------------------------------------
# SAVE TASKS TO FILE
# ------------------------------------------------------------

def save_tasks(tasks):
    with open(FILE_NAME, "w") as file:
        for task in tasks:
            file.write(task + "\n")


# ------------------------------------------------------------
# DISPLAY TASKS
# ------------------------------------------------------------

def show_tasks(tasks):
    if not tasks:
        print("No tasks found")
        return

    print("\n--- TO-DO LIST ---")
    for i, task in enumerate(tasks, start=1):
        print(f"{i}. {task}")


# ------------------------------------------------------------
# MAIN PROGRAM
# ------------------------------------------------------------

tasks = load_tasks()

while True:
    print("\n1. View Tasks")
    print("2. Add Task")
    print("3. Delete Task")
    print("4. Exit")

    choice = input("Choose option: ")


# ------------------------------------------------------------
# VIEW TASKS
# ------------------------------------------------------------

    if choice == "1":
        show_tasks(tasks)


# ------------------------------------------------------------
# ADD TASK
# ------------------------------------------------------------

    elif choice == "2":
        task = input("Enter new task: ")
        tasks.append(task)
        save_tasks(tasks)
        print("Task added!")


# ------------------------------------------------------------
# DELETE TASK
# ------------------------------------------------------------

    elif choice == "3":
        show_tasks(tasks)

        try:
            index = int(input("Enter task number to delete: ")) - 1
            removed = tasks.pop(index)
            save_tasks(tasks)
            print(f"Deleted: {removed}")
        except (ValueError, IndexError):
            print("Invalid selection")


# ------------------------------------------------------------
# EXIT
# ------------------------------------------------------------

    elif choice == "4":
        print("Goodbye!")
        break

    else:
        print("Invalid choice")


# ------------------------------------------------------------
# DEBUG TIP
# ------------------------------------------------------------

print("DEBUG: Program ended")


# ------------------------------------------------------------
# MINI CHALLENGE
# ------------------------------------------------------------
# Try:
# - mark task as completed
# - add priority (high/low)
# - save as JSON instead of txt
# ------------------------------------------------------------


# ------------------------------------------------------------
# END OF FILE
# ------------------------------------------------------------
# You built a persistent To-Do app 🎯🔥
# This is VERY close to real-world applications
# ------------------------------------------------------------