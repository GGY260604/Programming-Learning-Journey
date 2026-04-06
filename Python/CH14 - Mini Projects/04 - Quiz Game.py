# ============================================================
# FILE: CH14 - Mini Projects / 04 - Quiz Game.py
# ============================================================

# ------------------------------------------------------------
# PROJECT: QUIZ GAME
# ------------------------------------------------------------
# This program:
# - asks multiple questions
# - checks user answers
# - keeps score
# - shows final result
# ------------------------------------------------------------


# ------------------------------------------------------------
# QUIZ DATA
# ------------------------------------------------------------
# We use a list of dictionaries
# Each dictionary stores:
# - question
# - answer
# ------------------------------------------------------------

quiz_questions = [
    {
        "question": "What is the capital of Malaysia?",
        "answer": "kuala lumpur"
    },
    {
        "question": "What keyword is used to define a function in Python?",
        "answer": "def"
    },
    {
        "question": "What data type is used for True or False values?",
        "answer": "bool"
    },
    {
        "question": "Which symbol is used for comments in Python?",
        "answer": "#"
    },
    {
        "question": "What function is used to display output in Python?",
        "answer": "print"
    }
]


# ------------------------------------------------------------
# SCORE VARIABLE
# ------------------------------------------------------------
# This keeps track of how many correct answers the user gets
# ------------------------------------------------------------

score = 0


# ------------------------------------------------------------
# WELCOME MESSAGE
# ------------------------------------------------------------

print("===================================")
print("         PYTHON QUIZ GAME          ")
print("===================================")
print("Answer the questions below.")
print()


# ------------------------------------------------------------
# ASK QUESTIONS
# ------------------------------------------------------------
# We loop through each question one by one
# ------------------------------------------------------------

for index, item in enumerate(quiz_questions, start=1):
    print(f"Question {index}: {item['question']}")

    user_answer = input("Your answer: ").strip().lower()

    if user_answer == item["answer"]:
        print("Correct!\n")
        score += 1
    else:
        print(f"Wrong! Correct answer: {item['answer']}\n")


# ------------------------------------------------------------
# FINAL RESULT
# ------------------------------------------------------------

print("===================================")
print("            QUIZ RESULT            ")
print("===================================")
print(f"Your score: {score}/{len(quiz_questions)}")


# ------------------------------------------------------------
# PERFORMANCE MESSAGE
# ------------------------------------------------------------
# Show different message based on score
# ------------------------------------------------------------

if score == len(quiz_questions):
    print("Excellent! Perfect score!")
elif score >= 3:
    print("Good job! You did well.")
else:
    print("Keep practicing. You will improve!")


# ------------------------------------------------------------
# PERCENTAGE
# ------------------------------------------------------------

percentage = (score / len(quiz_questions)) * 100
print(f"Percentage: {percentage:.2f}%")


# ------------------------------------------------------------
# DEBUG TIP
# ------------------------------------------------------------
# If score looks wrong, print it after each question
# Example:
# print("DEBUG score:", score)
# ------------------------------------------------------------


# ------------------------------------------------------------
# MINI CHALLENGE
# ------------------------------------------------------------
# Try improving this project:
# - add more questions
# - allow multiple choice answers
# - shuffle the questions randomly
# - save score into a file
# ------------------------------------------------------------


# ------------------------------------------------------------
# END OF FILE
# ------------------------------------------------------------
# You built a quiz game 🎯🔥
# This project combines loops, conditions, input, and scoring
# ------------------------------------------------------------