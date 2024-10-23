def add_num(Num,num): #define fuction add_num
    return Num + num
 
try:
    user_input1 = int(input("enter one number")) # takes the first number
    user_input2 = int(input("enter second number ")) # takes the second number
    result = add_num(user_input1,user_input2) # the input are stored in the function add_num which pass them to be added in the return 

    print(f"the sum of{user_input1} and {user_input1} equalls to {result} ")

except ValueError:
    print("null: Try again please") #catchs the error case no value or entered str data type...