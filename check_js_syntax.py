import re
from pathlib import Path
path = Path('index.php')
text = path.read_text(encoding='utf-8')
match = re.search(r'<script>([\s\S]*?)</script>', text)
if not match:
    print('SCRIPT_NOT_FOUND')
    raise SystemExit(1)
script = match.group(1)
try:
    compile(script, 'index.php<script>', 'exec')
    print('OK')
except SyntaxError as e:
    print('SYNTAX_ERROR')
    print(f'{e.msg} at line {e.lineno} col {e.offset}')
    lines = script.splitlines()
    start = max(0, e.lineno - 3)
    end = min(len(lines), e.lineno + 2)
    for i in range(start, end):
        print(f'{i+1}: {lines[i]}')
    raise SystemExit(1)
