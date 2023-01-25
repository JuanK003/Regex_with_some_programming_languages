import re

pattern = re.compile(r'^([\d]{4,4})\-\d\d\-\d\d,(.+),(.+),(\d+),(\d+),.*$')

f = open("./results_4f052c2d-43b0-40fc-97a4-6672a196f4fb.csv", "r")

for line in f:
    res = re.match(pattern, line)
    if res:
        total = int(res.group(4)) + int(res.group(5))
        if total > 10:
            print("Goles: %d, [%s - %s], %s [%d - %d]\n" % (
                total, 
                res.group(1), 
                res.group(2), 
                res.group(3), 
                int(res.group(4)),
                int(res.group(5))
                ))
        #print("f{res}" % res.group(1))
    
f.close()