def quare(number):

    return number ** 2

try:
    user_input = int(input("Enter a number: ")) # take in the number as an integer input...
    result = quare(user_input) # here the user input is stored in the function number which then is squared (**2) to get the result
    print(f"The square of {user_input} is {result}.")
except ValueError:
    print("Not valid")
