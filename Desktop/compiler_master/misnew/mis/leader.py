
'''
from time import strftime
from datetime import datetime
date= datetime.fromtimestamp(int("1450117800")).strftime('%Y-%m-%d %H:%M:%S')
#date= datetime.fromtimestamp(int("1450031400")).strftime('%Y-%m-%d %H:%M:%S')
print date

from datetime import date
from time import mktime
start = datetime(2015,22,15,00,00,00)
print "gffgfg",int(mktime(start.timetuple()))

print "currect time",datetime.now().date()
print "currect time",datetime.now().time()

'''
##########
#1448515893
#1448515903

#########
#1448868776
from collections import OrderedDict
import datetime
import time
import MySQLdb
import sys
import smtplib
import time
import datetime
import operator
import HTML

from datetime import datetime,date,timedelta
from time import mktime
yesterday = date.today() - timedelta(1)
today=date.today()
#yesterday =  date.today()
print "yesterday",yesterday
#1454326818972
year = yesterday.strftime('%Y')
month = yesterday.strftime('%m')
day = yesterday.strftime('%d')
start = datetime(int(year),int(month),int(day),12,00,00)
time1= mktime(start.timetuple())
year = today.strftime('%Y')
month = today.strftime('%m')
day = today.strftime('%d')
start = datetime(int(year),int(month),int(day),12,00,00)
time2= mktime(start.timetuple())

 

def remove_duplicates(values):
        output = []
        seen = set()
        nlist = []
        for i in values:
                nlist = nlist+i
        for value in nlist:
                # If value has not been encountered yet,
                # ... add it to both list and set.
                if value not in seen:
                        output.append(value)
                        seen.add(value)
        return output
def cc():
	connection = MySQLdb.connect ("10.100.1.147",  "demo", "demo@123","cloudcoderdb")
	cc_test_results = connection.cursor()
	cc_test_results.execute("select s.event_id,e.user_id,u.username,e.problem_id,p.course_id,p.testname,cc.name,cc.title,u.email,t.name,cc.year, s.num_tests_attempted,s.num_tests_passed,e.timestamp from cc_events e,cc_users u,cc_submission_receipts s,cc_courses cc,cc_problems p,cc_terms t where cc.id =p.course_id and s.event_id=e.id and u.id=e.user_id and e.problem_id=p.problem_id and t.id=cc.term_id and left(e.timestamp,10) > %s  and left(e.timestamp,10) < %s and (left(u.username,5) = '14ITA' or left(u.username,5) = '13ITA' or left(u.username,5) = '15ITA' or u.username = '15IT0020')  order by u.id,p.problem_id"%(str(time1),str(time2)))
	result_cc_test_results = cc_test_results.fetchall()
	#print "result_cc_test_results",result_cc_test_results
	return result_cc_test_results, len(result_cc_test_results)


def html_call():
        # Calling SQL output
        result,length = cc() 
        
        #file_name = "cloudcoder_"+str(yesterday)+"."+"txt"
        #######################################################
        #######################################################
        # Number of users attempeted the problem (User with problem)
        up_list = "up"+"."+"txt"
        upname = open(up_list,'w')
        for j in range(1,length):
                upname.write(str(result[j][2]))
                upname.write(',')
                upname.write(str(result[j][5]))
                upname.write('\n')
        upname.close()
        
        # Reading the file to get username and password
        upname_list = up_list
        upname_line = [line.strip('\n') for line in open(upname_list)]  
        #print list(set(upname_line)),len(set(upname_line))
        
        #######################################################
        #######################################################
        '''
        username = "username_2015-11-30.txt"
        
        #Total Number Of users used cloudcoder today
        uname = open(username,'w')
        for j in range(1,length):
                uname.write(str(result[j][2]))
                uname.write('\n')
        uname.close()
        
        # Reading the file to get username 
        ufile_name = "username_2015-11-30.txt"
        ufile_list = [line.strip('\n') for line in open(ufile_name)]    
        #print list(set(ufile_list)),len(set(ufile_list))

        #######################################################
        #######################################################
        problem_name = "problemname_2015-11-30.txt"
        # Total number of problems attempted today
        pname = open(problem_name,'w')

        for k in range(1,length):
                pname.write(str(result[k][5]))
                pname.write('\n')
        pname.close()
        
        pfile_name = "problemname_2015-11-30.txt"
        pfile_list = [line.strip('\n') for line in open(pfile_name)]    
        #print list(set(pfile_list)),len(set(pfile_list))
        
        '''
        #######################################################
        #######################################################
        # Overall Statistics
        #file_name = "cloudcoder_2015-12_15.txt"
        file_name = "cloudcoder_"+"."+"txt"

        f1 = open(file_name, 'w')

        for i in range(1,length):
                f1.write(str(result[i][2]))  # username
                f1.write(',')
                f1.write(str(result[i][5]))  #problems
                f1.write(',')

                f1.write(str(result[i][6]))
                f1.write(',')

                f1.write(str(result[i][7]))
                f1.write(',')

                f1.write(str(result[i][9]))
                f1.write(',')

                f1.write(str(result[i][11]))
                f1.write(',')

                f1.write(str(result[i][12]))
                f1.write(',')

                f1.write(str(result[i][1]))
                f1.write(',')

                f1.write(str(result[i][3]))
                f1.write(',')

                f1.write(str(result[i][4]))
                f1.write(',')
                
                f1.write(str(result[i][13]))

                f1.write("\n")

        f1.close()
        
        
        file_name = "cloudcoder_"+"."+"txt"
        filename = open(file_name, 'r')
        lines = [line.strip('\n').split(",") for line in open(file_name)]
        #print "lines",lines
        username = ''
        completed = ''
        not_completed = ''
        count  = 0
        new_dict = {}
        attempted_dict = {}
        for j in list(set(upname_line)):
                jsplit = j.split(',')
                problem = []
                empty = []

                number_test_attempted = []
                number_test_passed    = []
                #print "jsplit",jsplit
                for i in lines:
                        if  jsplit[0] == i[0] and jsplit[1] == i[1]:
                                count  = count + 1
                                username = jsplit[0]
                                number_test_attempted.append(jsplit[1])
                                if int(i[5]) > 0 and int(i[6]) > 0:
                                        problem.append((jsplit[1],i[5],i[6],i[7],i[8],i[9],i[0],i[2],i[3],i[4],i[10])) 
                #print problem  
                # checking for empty list and adding list with only values
                if len(problem) > 0:
                        if not username in new_dict:
                                if username not in ['gandhimathi_kgcas','gokilavani_kgcas','bavani_it','ashok']:
                                        new_dict[username] = [problem]
                        else:
                                if username not in ['gandhimathi_kgcas','gokilavani_kgcas','bavani_it','ashok']:
                                        new_dict[username].append(problem)
                
                #Checking for attempted values
                if not username in attempted_dict:
                        attempted_dict[username] = [number_test_attempted]
                else:
                        attempted_dict[username].append(number_test_attempted)



        print "attempted_dict",attempted_dict
        print "new_dict",new_dict
        
        ##################################################
        #********checking for completed problems*********#
        
        result1 = {}
        for key,value in new_dict.items():
                print "main value",value
                completed_list = []
                for i in value:
                        largest = 0
                        for j in i:
                                if j[1] > largest:
                                        largest = j[1]
                                if j[2] == largest:
                                        #completed_list.append(j[0])
                                        completed_list.append(HTML.link(j[0], 'http://cloudcoder.kgkite.ac.in/cloudcoder/#submissions?c'+'='+str(j[5])+',p='+str(j[4])+',u='+str(j[3])))
                new_list = set(completed_list)
                result1[key] = list(new_list)
        print "result1",result1 
                                    
                                       
        ##################################################
        #DATABASE INSERTION
        ##################################################
        
        #connection2= MySQLdb.connect ("localhost","root","","cc_db")
        #local_stat=connection2.cursor()
        #local_stat.execute("insert into stat values(NULL,)")

        for k in sorted(new_dict, key=lambda k: len(new_dict[k]), reverse=True):  
                        #print "new_dict[k]",new_dict[k]
                        
                        for i in new_dict[k]:
                                   
                                   timestamp=i[0][10]
                                   user_name=i[0][6]
                                   user_id=i[0][3]
                                   course_name=str(i[0][7])
                                   prb_id=i[0][4]
                                   prb_name=str(i[0][0])
                                   course_id=i[0][5]
                                   tot_attempt=i[0][1]
                                   tot_passed=i[0][2]
                                   #compare=[user_name,user_id,prb_name,prb_id,course_name,course_id,tot_attempt,tot_passed,timestamp];
                                   #print compare
                                   #local_stat.execute("select * from cc_statistic ");
                                   #result_stat= local_stat.fetchall() 
                                   #stat=[result_stat[0][1],result_stat[0][2],result_stat[0][3],result_stat[0][4],result_stat[0][5],result_stat[0][6],result_stat[0][7],result_stat[0][8],result_stat[0][11]];
                                   #print stat
                                   
                                   #sql = """INSERT INTO stat(Id,Username,User_id,Problem_name,Problem_id,Course_name,Course_id,Tot_attempted,Tot_passed,Date,Time)VALUES (NULL,'aaaa',2,'xxxx',4,'yyy',1,1,4,date,time )"""
                                   #sql = """INSERT INTO stat(Id,Username,User_id,Problem_name,Problem_id,Course_name,Course_id,Tot_attempted,Tot_passed,Date,Time)VALUES (NULL,user_name,user_id,prb_name,prb_id,course_name,course_id,tot_attempt,tot_passed,date,time )%"""
                                   #sql = """INSERT INTO cc_statistic(Id,Username,User_id,Problem_name,Problem_id,Course_name,Course_id,Tot_attempted,Tot_passed,Date,Time,Timestamp,Completed)VALUES (NULL,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s )"""
                                   #query="""update cc_statistic set completed=1 where Tot_attempted=Tot_passed"""
                                   #local_stat.execute("insert into stat values(NULL,'sas','snd','jsnd','asjdu','djd','djd',76,89,1);")
                                   #local_stat.execute("insert into stat values(NULL,test,i[3,i[0],i[4],i[7],i[5],i[1],i[2],date,date)")
                                   #args = (user_name,user_id,prb_name,prb_id,course_name,course_id,tot_attempt,tot_passed,str(today),datetime.datetime.now().strftime("%H:%M:%S"),timestamp,0)
                                   
                                   
                                   
                                   #local_stat.execute(sql,args)
                                   #local_stat.execute(query)
                                   #connection2.commit()
                                   #remove_duplicates(stat)
                              
                                   
                                   
          #connection2.close()
                                          
        ##################################################
        #********checking for attempted problems*********#
        
        attempted_result = {}
        for key,value in attempted_dict.items():
                for i in value:
                        attempted_result[key] = remove_duplicates(value)
                        
        #print "attempted_result",attempted_result
        #sorted_x = sorted(result1, key=lambda k: len(result1[k]), reverse=True)
        
        #for k in sorted(result1, key=lambda k: len(result1[k]), reverse=True): 
                #print k,result1[k]
                #print OrderedDict(sorted(result1.items(), key=lambda t: len(t[0])))
        #######################
        f = open('table.txt', 'w')
        '''
        f.write("<!DOCTYPE html>")
        f.write("<html>")

        f.write("<head>")
        f.write("<meta charset=\"UTF-8\">")
        f.write("<title>Report Table</title>")  
        f.write("<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">")
        f.write("<!--[if !IE]><!-->")
        f.write("<style>")      
        f.write("* {")
        f.write("margin: 0;") 
        f.write("padding: 0;") 
        f.write("}")
        f.write("body {") 
        f.write("font: 12px/1.4 Segoe UI, Serif; /*Segoe UI,arial---Georgia, Serif*/")
        f.write("width:100% !important;")
        f.write("padding: 0px !important;")
        f.write("}")
        f.write("#page-wrap {")
        f.write("/*margin: 50px;*/")
        f.write("margin: 20px;")
        f.write("}")
        f.write("p {")
        f.write("margin: 20px 0;") 
        f.write("}")

        f.write("/*") 
        f.write("Generic Styling, for Desktops/Laptops") 
        f.write("*/")
        f.write("table {") 
        f.write("width: 100%;") 
        f.write("border-collapse: collapse;") 
        f.write("font-size:12px !important;")
        f.write("}")
        f.write("/* Zebra striping */")
        f.write("tr:nth-of-type(odd) {") 
        f.write("background: #eee;") 
        f.write("}")
        f.write("th {") 
        f.write("background: rgb(193,77,255);")
        f.write("color: white;") 
        f.write("font-weight: bold;") 
        f.write("}")
        f.write(".headth {") 
        f.write("background:#75bdd1;")
        f.write("color: white;") 
        f.write("font-weight: bold;") 
        f.write("}")
                        
        f.write("td, th {") 
        f.write("padding: 6px;") 
        f.write("border: 1px solid #ccc;") 
        f.write("text-align: left;") 
        f.write("}")
        f.write(".total {")
        f.write("font-weight: 700;")
        f.write("}")            
        f.write(".even { background-color:#FFF; }")
        f.write(".odd { background-color:#666; }")
        f.write("/*.width{width:100%;}*/")
        f.write("</style>")
        f.write("<!--<![endif]-->")
        f.write("</head>")
        f.write("<body>")
        f.write("<div id=\"page-wrap\">")
        f.write("<div class=\"width\">")
        f.write("<!-- <h1>CloudCoder E-Box Daily Report</h1>  --> ")
        f.write("<h1 style=\"font-size: 24px;\">CloudCoder E-Box Daily Report</h1>")
        f.write("<hr style=\"color:#D00000;border: 1px solid;\">")
        f.write("<h2 style=\"margin-top:10px;margin-bottom:10px;text-align:center;border-top:1px solid#cecece;border-bottom:1px solid#cecece;padding: 10px;\">KGISL Dated : "+str(today)+"</h2>")       
        f.write("</div>")
        f.write("<!--------------------------------Start Electricity----------------------------------------->")
        f.write("<div class=\"width\">")
        f.write("<h2 style=\"margin-top:10px;margin-bottom:10px;text-align:center;border-top:1px solid#cecece;border-bottom:1px solid#cecece;padding:5px;text-transform: uppercase;   background-color: #75890c;color: #FFF;\">E-BOX Assessment Report</h2>")
        f.write("<table>")
        f.write("<thead>")              
        #f.write("<tr>")
        #<th colspan="7" class="headth"></th>
        #<th colspan="2" class="headth">Yesterday</th>
        #<th colspan="2" class="headth">Last 7 days</th>
        #<th colspan="2" class="headth">Last 30 days</th>                       
        #</tr>
        f.write("<tr>")
        f.write("<th>S.No</th>")
        f.write("<th>Username</th>")
        f.write("<th>Problem Names</th>")
        f.write("<th>Total completed Problems</th>")
        f.write("</tr>")
        f.write("</thead>")
        f.write("<tbody>")
        f.write("<tr>")
        if len(result1) == 0:
                f.write("<h2 style=\"margin-top:10px;margin-bottom:10px;text-align:center;border-top:1px solid#cecece;border-bottom:1px solid#cecece;padding:5px;text-transform: uppercase;   background-color: #75890c;color: #FFF;\">No Updates</h2>")
        else:
                count = 1
                for k in sorted(result1, key=lambda k: len(result1[k]), reverse=True):  
                        
                        if len(result1[k]) > 0:
                                f.write("<td>")

                                f.write(str(count))
                                f.write("</td>")

                                f.write("<td>")
                                f.write(str(k))
                                f.write("</td>")
                                
                                f.write("<td>")

                                f.write(','.join(result1[k]))
                                f.write("</td>")
                                
                                f.write("<td>")
                                f.write(str(len((result1[k]))))
                                f.write("</td>")                        
                        count = count + 1
        f.write("</tr>")
        f.write("</tbody>")
        f.write("</table>")
        f.write("</div>")
                
        f.write("<!--------------------------------End Water----------------------------------------->")        
        f.write("<div  style=\"text-align: right;\"><span>Auto Generated E-Mail, Don\"t Reply.</span> Powered by <a href=\"http://ias.kgisl.com\">KGISL</a></div>")
        f.write("</div>")               
        f.write("</body>")
        f.write("</html>")
        f.close()
        '''
        #######################
        
        f.write('<html>')
        f.write("<head>" "<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge,chrome=1\" />"
          "<meta http-equiv=\"refresh\" content=\"50\">"
          "<meta charset=\"utf-8\" />"
          "<title>Student details</title>"

          "<meta name=\"description\" content=\"Static &amp; Dynamic Tables\" />"
          "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, maximum-scale=1.0\" />"
          "<link rel=\"stylesheet\" href=\"project/ace-master/assets/css/bootstrap.min.css\" />"
          "<link rel=\"stylesheet\" href=\"project/ace-master/assets/font-awesome/4.2.0/css/font-awesome.min.css\" />"

          "<link rel=\"stylesheet\" href=\"project/ace-master/assets/fonts/fonts.googleapis.com.css\" />"

          "<link rel=\"stylesheet\" href=\"project/ace-master/assets/css/ace.min.css\" class=\"ace-main-stylesheet\" id=\"main-ace-style\" />"

          "<script src=\"project/ace-master/assets/js/ace-extra.min.js\"></script>"

        "</head>")
        
        f.write('<body>')
        #f.write('<h1>TagCanvas example page</h1>')
        
        
                 
        f.write("<div><table id=\"dynamic-table\" class=\"table table-striped table-bordered table-hover\"><thead><tr><th>S.No</th><th>User Name</th><th>Problem Names</th><th>Total Completed Problems</th></tr></thead><tbody>")

        count = 1
        for k in sorted(result1, key=lambda k: len(result1[k]), reverse=True):  
                if len(result1[k]) > 0:
                        f.write('<tr>')
                        f.write('<td>')
                        f.write(str(count))
                        f.write('</td>')
                        f.write('<td>')
                        f.write(str(k))
                        f.write('</td>')
                        
                        f.write('<td>')
                        f.write(','.join(result1[k]))

                        f.write('</td>')
                        
                        f.write('<td>')
                        f.write(str(len((result1[k]))))

                        f.write('</td>')

                        f.write('</tr>')
                count = count + 1        
        f.write('</tbody>')     
        f.write('</table>')
        f.write('</div>')
          
        #############
        '''
        f.write('<div style="float:left;width:100%">')

        f.write('<table width="100%" border="1" cellspacing="2" cellpadding="2" style="border-collapse:collapse;float:left">')
        f.write('<tr>')
        f.write('<th scope="col" style=" background-color:#0FF"><strong><em>S.No </em></strong></th>')
        f.write('<th scope="col" style=" background-color:#0FF"><strong><em>User </em></strong></th>')
        f.write(' <th scope="col" style=" background-color:#0FF"><strong><em>Problem </em></strong></th>')
        f.write(' <th scope="col" style=" background-color:#0FF"><strong><em>(Attempted)</em></strong></th>')
        f.write('</tr>')
        count = 1
    #https://cloudcoder.kgkite.ac.in/cloudcoder/#submissions?c='+str(result_cc_test_results[0][4])
    #+',p='+str(result_cc_test_results[0][3])+',u='+str(result_cc_test_results[0][1])
        
        for k in sorted(attempted_result, key=lambda k: len(attempted_result[k]), reverse=True):        
                
                f.write('<tr>')
                
                f.write('<td>')
                f.write(str(count))
                f.write('</td>')
                
                f.write('<td>')
                f.write(str(k))
                f.write('</td>')
                
                f.write('<td>')
                f.write(','.join(attempted_result[k]))
                f.write('</td>')
                
                f.write('<td>')
                f.write(str(len((attempted_result[k]))))
                f.write('</td>')

                f.write('</tr>')


                        

                count = count + 1
        f.write('</table>')
        f.write('</div>')

        f.write('</div>')
        f.write('</body>')
        f.write('</html>')

        

        #f.write('<center>')
        #f.write('<center><p><i>The problem newly added is almost_equal in difficult level by ashok b.</i></p>')
        #f.write('<center>')
                
        #f.write('"""')
        '''
        f.close()
       
        
html_call()


