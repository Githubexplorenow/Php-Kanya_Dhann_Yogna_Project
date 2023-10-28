class exception_handling
{
public static void main(String args[])
{
	try
	{
		system.out.print("Hello"+" "+1/0);
	}
	catch(ArithmeticException e)
	{
		System.out.print("World");
	}
}
}