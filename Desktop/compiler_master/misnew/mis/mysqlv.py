import html
import MySQLdb
importlib.import_module()
import sys
import smtplib
import html
import time
import datetime

from datetime import date, timedelta
yesterday = date.today() - timedelta(1)
print "yesterday",yesterday
today = datetime.date.today()
now = time.strftime("%c")
## date and time representation
print "Current date & time " + time.strftime("%c")
#stop

def sql_data():
	# open a database connection
	# be sure to change the host IP address, username, password and database name to match your own
	connection = MySQLdb.connect ("10.100.1.153",  "demo", "demo@123","cloudcoderdb")

	cc_test_results = connection.cursor()
	cc_test_results.execute("SELECT count(*) FROM cc_test_results");
	result_cc_test_results=cc_test_results.fetchall() 
	#print "result_cc_test_results",result_cc_test_results[0][0]

	cc_users = connection.cursor()
	cc_users.execute("SELECT count(*) FROM cc_users");
	result_cc_users=cc_users.fetchall() 
	#print "result_cc_users",result_cc_users[0][0]
	
	cc_email= connection.cursor()
	cc_email.execute("SELECT email FROM cc_users");
	result_cc_mail=cc_email.fetchall() 
	#print "result_cc_users",result_cc_mail
	#for i in result_cc_mail:
		#print "i",i

	cc_course_registrations = connection.cursor()
	cc_course_registrations.execute("SELECT count(*) FROM cc_course_registrations");
	result_cc_course_registrations=cc_course_registrations.fetchall() 
	#print 'result_cc_course_registrations',result_cc_course_registrations[0][0]

	cc_courses= connection.cursor()
	cc_courses.execute("SELECT count(*) FROM cc_courses");
	result_cc_courses=cc_courses.fetchall() 
	#print 'result_cc_courses',result_cc_courses[0][0]


	cc_problems= connection.cursor()
	cc_problems.execute("SELECT count(*) FROM cc_problems");
	result_cc_problems=cc_problems.fetchall() 
	#print 'result_cc_courses',result_cc_problems[0][0]

	cc_test_cases= connection.cursor()
	cc_test_cases.execute("SELECT count(*) FROM cc_test_cases");
	result_cc_test_cases=cc_test_cases.fetchall() 
	#print 'result_cc_test_cases',result_cc_test_cases[0][0]

	cc_submission_receipts= connection.cursor()
	cc_submission_receipts.execute("SELECT count(*) FROM cc_submission_receipts");
	result_cc_submission_receipts=cc_submission_receipts.fetchall() 
	#print "result_cc_submission_receipts",result_cc_submission_receipts[0][0]
	

	connection.close ()
	fn="sub_recipt.txt"
	f1=open(fn,'w')
	f1.write(str(result_cc_submission_receipts[0][0]))
	
	fn="tc_result.txt"
	f2=open(fn,'w')
	f2.write(str(result_cc_test_results[0][0]))
	
	fn="solved_problem.txt"
	f3=open(fn,'w')
	f3.write(str(result_cc_problems[0][0]))
	
	fn="test_cases.txt"
	f4=open(fn,'w')
	f4.write(str(result_cc_test_cases[0][0]))
	
	fn="course_reg.txt"
	f5=open(fn,'w')
	f5.write(str(result_cc_course_registrations[0][0]))
	
	fn="users.txt"
	f6=open(fn,'w')
	f6.write(str(result_cc_users[0][0]))

	fn="courses.txt"
	f7=open(fn,'w')
	f7.write(str(result_cc_courses[0][0]))
	return result_cc_test_results[0][0],result_cc_users[0][0],result_cc_course_registrations[0][0],result_cc_courses[0][0],result_cc_problems[0][0],result_cc_test_cases[0][0],result_cc_submission_receipts[0][0]


print sql_data()

'''
def read_files():
	result = sql_data() 
	file_name = "cloudcoder_"+str(yesterday)+"."+"txt"
	#file_name = "cloudcoder_2015-09-15.txt"
	filename = open(file_name, 'r')
	
	file_list = filename.readline().split(',')
	print "file_list",file_list
	if int(file_list[0]) >= result[1]:
		#print "gdfgfj"
		result_cc_users = int(file_list[0])-result[1]
	else: 
		#print "correct"
		result_cc_users = result[1] - int(file_list[0])
		
	if int(file_list[2]) >= result[5]:
		result_cc_test_cases = int(file_list[2]) - result[5]
	else:
		result_cc_test_cases = result[5] - int(file_list[2]) 

	if int(file_list[3]) >= result[0]:
		result_cc_test_results = int(file_list[3]) - result[0]
	else:
		result_cc_test_results = result[0]- int(file_list[3]) 
	if int(file_list[4]) >= result[6]:
		result_cc_submission_receipts = int(file_list[4]) - result[6]
	else:
		result_cc_submission_receipts = result[6] - int(file_list[4])
	if int(file_list[5]) >= result[2]:
		result_cc_course_registrations = int(file_list[5]) - result[2]
	else:
		result_cc_course_registrations = result[2] - int(file_list[5]) 
	if int(file_list[6]) >= result[3]:
		result_cc_courses = int(file_list[6]) - result[3]
	else:
		result_cc_courses = result[3] - int(file_list[6]) 


	if int(file_list[1]) >= result[4]:
		result_cc_problems = int(file_list[1]) - result[4]
		#print "wrong",result_cc_problems
	else:
		result_cc_problems = result[4] - int(file_list[1]) 
		#print "hhvhvbhgh", result_cc_problems
		
	print "result_cc_test_results",result_cc_users
	print "result_cc_problems",result_cc_problems
	print "result_cc_test_cases",result_cc_test_cases
	print "result_cc_test_results",result_cc_test_results
	print "result_cc_submission_receipts",result_cc_submission_receipts
	print "result_cc_course_registrations",result_cc_course_registrations
	print "result_cc_courses",result_cc_courses
	
	return result_cc_users,result_cc_problems,result_cc_test_cases,result_cc_test_results,result_cc_submission_receipts,result_cc_course_registrations,result_cc_courses




def html_call():
	
	# Calling SQL output
	result = sql_data() 
	file_name = "cloudcoder_"+str(yesterday)+"."+"txt"
	#file_name = "cloudcoder_2015-09-15.txt"
	filename = open(file_name, 'r')
	
	file_list = filename.readline().split(',')
	print "file_list",file_list
	filename = "cloudcoder_"+str(today)+"."+"txt"
	
	print "filename",filename
	previous_count = read_files()
	
	
	
	f1 = open(filename, 'w')
	f1.write(str(result[1]))
	f1.write(',')
	f1.write(str(result[4]))
	f1.write(',')

	f1.write(str(result[5]))
	f1.write(',')

	f1.write(str(result[0]))
	f1.write(',')

	f1.write(str(result[6]))
	f1.write(',')

	f1.write(str(result[2]))
	f1.write(',')

	f1.write(str(result[3]))
	f1.close()
	
	

	
	print result[0]
	f = open('test1.html', 'w')
	
	
	f.write('<html>' + '<br>')
	f.write('<head>' + '<br>')
	f.write('<center><font><b>Cloud Coder Statistics on ')
	f.write(str(now))
	f.write('</center><b></font><br>')

	f.write('</head>')
	f.write('<body>')
	#f.write('<h1>TagCanvas example page</h1>')
	f.write('<center><table width="600" border="1" cellspacing="2" cellpadding="2" style="border-collapse:collapse">')
	f.write('<tr>')
	f.write('<th scope="col" style=" background-color:#0FF"><strong><em>Statistics</em></strong></th>')
	f.write(' <th scope="col" style=" background-color:#0FF"><strong><em>Today\'s Count</em></strong></th>')
	f.write(' <th scope="col" style=" background-color:#0FF"><strong><em>Yesterday\'s Count</em></strong></th>')
	f.write(' <th scope="col" style=" background-color:#0FF"><strong><em>Variance</em></strong></th>')
	f.write('</tr>')
	
	
	f.write('<tr>')
	f.write('<td>')
	f.write('<b>Number of Submission Receipts</b>')
	f.write('</td>')
	f.write('<td>')
	f.write(str(result[6]))
	f.write('</td>')
	f.write('<td>')
	f.write(str(file_list[4]))
	f.write('</td>')
	f.write('<td>')
	f.write(str(previous_count[4]))
	f.write('</td>')
	f.write('<tr>')
	
	
	f.write('<tr>')
	f.write('<td>')
	f.write('<b>Number of Test Case Results</b>')
	f.write('</td>')
	f.write('<td>')
	f.write(str(result[0]))
	f.write('</td>')
	f.write('<td>')
	f.write(str(file_list[3]))
	f.write('</td>')
	f.write('<td>')
	f.write(str(previous_count[3]))
	f.write('</td>')
	f.write('<tr>')
	
	f.write('<tr>')
	f.write('<td>')
	f.write('<b>Number of Problems</b>')
	f.write('</td>')
	f.write('<td>')
	f.write(str(result[4]))
	f.write('</td>')
	f.write('<td>')
	f.write(str(file_list[1]))
	f.write('</td>')
	f.write('<td>')
	f.write(str(previous_count[1]))
	f.write('</td>')
	f.write('<tr>')

	f.write('<tr>')
	f.write('<td>')
	f.write('<b>Number of Test Cases</b>')
	f.write('</td>')
	f.write('<td>')
	f.write(str(result[5]))
	f.write('</td>')
	f.write('<td>')
	f.write(str(file_list[2]))
	f.write('</td>')
	f.write('<td>')
	f.write(str(previous_count[2]))
	f.write('</td>')
	f.write('<tr>')


	

	f.write('<tr>')
	f.write('<td>')
	f.write('<b>Number of Course Registrations</b>')
	f.write('</td>')
	f.write('<td>')
	f.write(str(result[2]))
	f.write('</td>')
	f.write('<td>')
	f.write(str(file_list[5]))
	f.write('</td>')
	f.write('<td>')
	f.write(str(previous_count[5]))
	f.write('</td>')
	f.write('<tr>')
	
	f.write('<tr>')
	f.write('<td>')
	f.write('<b>Number of Users</b>')
	f.write('</td>')
	f.write('<td>')
	f.write(str(result[1]))
	f.write('</td>')
	f.write('<td>')
	f.write(str(file_list[0]))
	f.write('</td>')
	f.write('<td>')
	f.write(str(previous_count[0]))
	f.write('</td>')
	f.write('</tr>')

	f.write('<tr>')
	f.write('<td>')
	f.write('<b>Number of Courses</b>')
	f.write('</td>')
	f.write('<td>')
	f.write(str(result[3]))
	f.write('</td>')
	f.write('<td>')
	f.write(str(file_list[6]))
	f.write('</td>')
	f.write('<td>')
	f.write(str(previous_count[6]))
	f.write('</td>')
	f.write('<tr>')
	f.write('</table></center>')
	#f.write('<center><p><i>No problem is added newly.</i></p>')
	#f.write('<center>')
	#f.write('<center><p><i>The problem newly added is almost_equal in difficult level by ashok b.</i></p>')
	#f.write('<center>')
	
	#f.write('"""')
	f.close()
	
	
	#sys.exit()
html_call()

'''
